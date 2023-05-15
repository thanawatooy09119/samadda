(function($) {
function getRangeBounds(r) {
    function isCDN(n) {
        var t = n.nodeType;
        return t == 3 || t == 4 || t == 8;
    }


    function getNodeIndex(node) {
        var i = 0;
        while( (node = node.previousSibling) ) {
            i++;
        }
        return i;
    }


    function splitDataNode(node, index) {
        var newNode;
        if (node.nodeType == 3) {
            newNode = node.splitText(index);
        } else {
            newNode = node.cloneNode();
            newNode.deleteData(0, index);
            node.deleteData(0, node.length - index);
            insertAfter(newNode, node);
        }
        return newNode;
    }


    function updateRange(range, startContainer, startOffset, endContainer,endOffset) {
        var startMoved = (range.startContainer !== startContainer || range.startOffset != startOffset);
        var endMoved = (range.endContainer !== endContainer || range.endOffset != endOffset);

        if (endMoved) {
            range.setEnd(endContainer, endOffset);
        }

        if (startMoved) {
            range.setStart(startContainer, startOffset);
        }
    }

    function split() {
        var sc = this.startContainer, so = this.startOffset, ec = this.endContainer, eo = this.endOffset;
        var startEndSame = (sc === ec);

        if (isCDN(ec) && eo > 0 && eo < ec.length) {
            splitDataNode(ec, eo);
        }

        if (isCDN(sc) && so > 0 && so < sc.length) {
            sc = splitDataNode(sc, so);
            if (startEndSame) {
                eo -= so;
                ec = sc;
            } else if (ec == sc.parentNode && eo >= getNodeIndex(sc)) {
                eo++;
            }
            so = 0;
        }
        updateRange(this, sc, so, ec, eo);
    }


    function normalize() {
        var sc = this.startContainer, so = this.startOffset, ec = this.endContainer, eo = this.endOffset;

        var mergeForward = function(node) {
            var sibling = node.nextSibling;
            if (sibling && sibling.nodeType == node.nodeType) {
                ec = node;
                eo = node.length;
                node.appendData(sibling.data);
                sibling.parentNode.removeChild(sibling);
            }
        };

        var mergeBackward = function(node) {
            var sibling = node.previousSibling;
            if (sibling && sibling.nodeType == node.nodeType) {
                sc = node;
                var nodeLength = node.length;
                so = sibling.length;
                node.insertData(0, sibling.data);
                sibling.parentNode.removeChild(sibling);
                if (sc == ec) {
                    eo += so;
                    ec = sc;
                } else if (ec == node.parentNode) {
                    var nodeIndex = getNodeIndex(node);
                    if (eo == nodeIndex) {
                        ec = node;
                        eo = nodeLength;
                    } else if (eo > nodeIndex) {
                        eo--;
                    }
                }
            }
        };

        var normalizeStart = true;

        if (isCDN(ec)) {
            if (ec.length == eo) {
                mergeForward(ec);
            }
        } else {
            if (eo > 0) {
                var endNode = ec.childNodes[eo - 1];
                if (endNode && isCDN(endNode)) {
                    mergeForward(endNode);
                }
            }
            normalizeStart = !this.collapsed;
        }

        if (normalizeStart) {
            if (isCDN(sc)) {
                if (so == 0) {
                    mergeBackward(sc);
                }
            } else {
                if (so < sc.childNodes.length) {
                    var startNode = sc.childNodes[so];
                    if (startNode && isCDN(startNode)) {
                        mergeBackward(startNode);
                    }
                }
            }
        } else {
            sc = ec;
            so = eo;
        }

        updateRange(this, sc, so, ec, eo);
    }


    function mergeRects(rect1, rect2) {
        var rect = {
            top: Math.min(rect1.top, rect2.top),
            bottom: Math.max(rect1.bottom, rect2.bottom),
            left: Math.min(rect1.left, rect2.left),
            right: Math.max(rect1.right, rect2.right)
        };
        rect.width = rect.right - rect.left;
        rect.height = rect.bottom - rect.top;

        return rect;
    }

    function getRectFromBoundaries(range) {
        split.apply(range);
        var span = document.createElement("span");
        var workingRange = range.cloneRange();
        workingRange.collapse(true);
        workingRange.insertNode(span);
        var startRect = span.getBoundingClientRect();
        span.parentNode.removeChild(span);
        workingRange = range.cloneRange();
        workingRange.collapse(false);
        //workingRange.collapseToPoint(range.endContainer, range.endOffset);
        workingRange.insertNode(span);
        var endRect = span.getBoundingClientRect();
        span.parentNode.removeChild(span);
        normalize.apply(range);
        return mergeRects(startRect, endRect);
    }

    if (typeof r.getBoundingClientRect == 'function') {
        var rect = r.getBoundingClientRect();
        if (rect) {
            return rect;
        }
    }

    return getRectFromBoundaries(r);
}


function makeEditable(container, inner, editable) {

    function getSelectionPos() {
        var sel = window.getSelection();
        if (sel.rangeCount == 0) {
            return;
        }
        var r = sel.getRangeAt(0);
        var div = r.commonAncestorContainer;
        var divParent = div;
        while (divParent && divParent.parentNode && divParent != editable[0]) {
            divParent = divParent.parentNode;
        }
        if (!divParent) {
            return;
        }
        var s = r.startContainer;
        var e = r.endContainer;
        if (!s || !e) {
            return;
        }
        var rect = getRangeBounds(r);
        var startPos = r.startOffset, endPos = r.endOffset;
        if (!rect || (rect.left == 0 && rect.right == 0)) {
            console.log('no rect');
            return;
        }
        rect = {left: rect.left, right: rect.right};
        var isCollapsed = r.collapsed;
        // Strange edge-cases in Fx where the cursor is right next to an image elem.
        // This code is highly magical. Stay away if you know what's good for you.
        if (s == divParent) {
            s = $(divParent).children('img').get(Math.floor((startPos - 1) / 2));
            startPos = (startPos - 1) % 2;
            var imgRect = (s || divParent).getBoundingClientRect();
            rect.left = imgRect.left;
        }
        
        if (e == divParent) {
            e = $(divParent).children('img').get(Math.floor((endPos - 1) / 2));
            endPos = (endPos - 1) % 2;
            imgRect = (e || divParent).getBoundingClientRect();
            rect.right = imgRect.right;
        }

        if (!s || !e || (s.parentNode != divParent) || (e.parentNode != divParent)) {
            //console.log('hierarchy fubared!', e, s, divParent);
            return;
        }
        var startNodePos = $.inArray(s, divParent.childNodes), endNodePos = $.inArray(e, divParent.childNodes);
        return [[startNodePos, startPos], [endNodePos, endPos], rect, isCollapsed];
    }

    var _lastSelPos = [[0, 0], [0, 0]];
    function getLastCursorPos() {
        var selPos = getSelectionPos();
        if (!selPos) {
            return;
        }
        if (selPos[3]) {
            var movement = (selPos[0][0] > _lastSelPos[0][0] || (selPos[0][0] == _lastSelPos[0][0] && selPos[0][1] > _lastSelPos[0][1])) ? 1 : 0;
            _lastSelPos = selPos;
            return [movement, selPos[2]];
        }

        if (_lastSelPos[0][0] != selPos[0][0] || _lastSelPos[0][1] != selPos[0][1]) {
            _lastSelPos = selPos;
            return [0, selPos[2]];
        }
        if (_lastSelPos[1][0] != selPos[1][0] || _lastSelPos[1][1] != selPos[1][1]) {
            _lastSelPos = selPos;
            return [1, selPos[2]];
        }
        return null;
    }


    function scrollDivTo(pos) {
        var rect = pos[1];
        var bounds = container[0].getBoundingClientRect();
        var currentLeft = inner.position().left;
        //console.log(currentLeft, 'bounds (l, r)', bounds.left, bounds.right, 'sel (l, r)', rect.left, rect.right);
        if (pos[0] == 0) {
            if (rect.left - bounds.left < 0) {
                inner.css('left', currentLeft - (rect.left - bounds.left) + 'px');
            } else if (bounds.right - rect.left < 1) {
                inner.css('left', currentLeft + (bounds.right - rect.left) + 'px');
            }
        } else if (pos[0] == 1) {
            if (rect.right - bounds.left < 0) { // we're off to the left of the box, correct:
                inner.css('left', currentLeft - (rect.right - bounds.left) + 'px');
            } else if (bounds.right - rect.right < 1) { // we're off to the right of the box, correct:
                inner.css('left', currentLeft + (bounds.right - rect.right) + 'px');
            }
        }
    }

    function startDrag(e) {
        function endDrag() {
            $(document).unbind('.htmleditordrag');
            clearTimeout(_dragTimeout);
        };

        var lastLeft = e.pageX - document.body.scrollLeft - document.documentElement.scrollLeft;
        function updateCoordinate(e) {
            lastLeft = e.pageX - document.body.scrollLeft - document.documentElement.scrollLeft;
        }

        var maxLeft = editable.width() - container.width();
        function whileDragging() {
            var p = getLastCursorPos();
            if (p) {
                scrollDivTo(p);
                console.log(inner.css('left'));
            }
            var rect = container[0].getBoundingClientRect();
            var lDiff = lastLeft - rect.left, rDiff = lastLeft - rect.right;
            var currentLeft = inner.position().left;
            if (lastLeft < rect.left) {
                inner.css('left', Math.min(0, currentLeft - lDiff * 0.1) + 'px');
            } else if (lastLeft > rect.right) {
                inner.css('left', Math.max(-maxLeft, currentLeft - rDiff * 0.1) + 'px');
            }
            _dragTimeout = setTimeout(whileDragging, 50);
        }
        $(document).bind('mouseup.htmleditordrag', endDrag);
        $(document).bind('mousemove.htmleditordrag', updateCoordinate);
        var _dragTimeout = setTimeout(whileDragging, 50);
    }

    function cleanUp(e) {
        editable.find(':not(img)').each(function() {
            // Hack to preserve terminal br in Firefox (wtf?)
            if (this.tagName.toLowerCase() == 'br' && !this.nextSibling) {
                return;
            }
            $(this).replaceWith(function() {
                return $(this).text();
            });
        });
        editable.find('img').each(function() {this.contentEditable = false; });
        var p = getLastCursorPos();
        if (p) {
            scrollDivTo(p);
        }
        editable.trigger('contentupdate');
    }

    // Hook it all up:
    editable.bind('paste keydown mousedown mouseup', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        } else {
            setTimeout(cleanUp, 4);
        }
    }).bind('mousedown', startDrag);

    container.bind('click', function() {
        editable.focus();
    });

    // Make sure we don't break in browsers without a console:
    if (!window.console) { window.console = {log: $.noop} }
}


$.fn.htmlEditable = function() {
    if (this.data('__htmlEditable')) {
        return;
    }

    if (!$.support.singleLineContentEditable) {
        console.log('no can do');
        return this;
    }

    this.css({
        overflow: 'hidden',
        position: this.css('position') == 'absolute' ? 'absolute' : 'relative'
    }).html('<div class="ceinner"><div class="htmleditable" contenteditable="true"></div></div>');
    var inner = this.children();
    var editable = inner.children();

    inner.css({
        margin: 0,
        padding: 0,
        position: 'absolute',
        left: 0,
        top: 0,
        overflow: 'visible'
    });
    editable.css({
        height: this.css('height'),
        'min-width': this.css('width'),
        'font-size': this.css('font-size'),
        'white-space': 'nowrap'
    });
    makeEditable(this, inner, editable);
    this.data('__htmlEditable', true);
    return this;
}

$.support.singleLineContentEditable = (function() {
    if (!('contentEditable' in document.body)) {
        return false;
    }
    // Bloody iOS 4 and lower pretends to support but offers no user input support. Support
    // exists in iOS 5, however... Do painful UA string parsing:
    var ua = navigator.userAgent;
    var isIOS = (ua.indexOf('iPad') > -1 || ua.indexOf('iPhone') > -1 || ua.indexOf('iPod') > -1) && $.browser.safari;
    var iOSVersion = 1;
    if (isIOS) {
        var version = ua.match(/(\S+)\s+like Mac/i);
        if (version) {
            version = version[1];
            version = version.match(/^\d+/);
            version = version && version[0] * 1;
            iOSVersion = version || iOSVersion;
        }
    }
    var isCompatibleIOS = !isIOS || iOSVersion >= 5;
    var s = window.getSelection && window.getSelection();
    return isCompatibleIOS && s && s.getRangeAt && document.body.getBoundingClientRect;
})();
})(jQuery);

