/*!
 * Isotope PACKAGED v3.0.6
 *
 * Licensed GPLv3 for open source use
 * or Isotope Commercial License for commercial use
 *
 * https://isotope.metafizzy.co
 * Copyright 2010-2018 Metafizzy
 */
! function(t, e) {
    "function" == typeof define && define.amd ? define("jquery-bridget/jquery-bridget", ["jquery"], function(i) {
        return e(t, i)
    }) : "object" == typeof module && module.exports ? module.exports = e(t, require("jquery")) : t.jQueryBridget = e(t, t.jQuery)
}(window, function(t, e) {
    "use strict";

    function i(i, s, a) {
        function u(t, e, o) {
            var n, s = "$()." + i + '("' + e + '")';
            return t.each(function(t, u) {
                var h = a.data(u, i);
                if (!h) return void r(i + " not initialized. Cannot call methods, i.e. " + s);
                var d = h[e];
                if (!d || "_" == e.charAt(0)) return void r(s + " is not a valid method");
                var l = d.apply(h, o);
                n = void 0 === n ? l : n
            }), void 0 !== n ? n : t
        }

        function h(t, e) {
            t.each(function(t, o) {
                var n = a.data(o, i);
                n ? (n.option(e), n._init()) : (n = new s(o, e), a.data(o, i, n))
            })
        }
        a = a || e || t.jQuery, a && (s.prototype.option || (s.prototype.option = function(t) {
            a.isPlainObject(t) && (this.options = a.extend(!0, this.options, t))
        }), a.fn[i] = function(t) {
            if ("string" == typeof t) {
                var e = n.call(arguments, 1);
                return u(this, t, e)
            }
            return h(this, t), this
        }, o(a))
    }

    function o(t) {
        !t || t && t.bridget || (t.bridget = i)
    }
    var n = Array.prototype.slice,
        s = t.console,
        r = "undefined" == typeof s ? function() {} : function(t) {
            s.error(t)
        };
    return o(e || t.jQuery), i
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("ev-emitter/ev-emitter", e) : "object" == typeof module && module.exports ? module.exports = e() : t.EvEmitter = e()
}("undefined" != typeof window ? window : this, function() {
    function t() {}
    var e = t.prototype;
    return e.on = function(t, e) {
        if (t && e) {
            var i = this._events = this._events || {},
                o = i[t] = i[t] || [];
            return o.indexOf(e) == -1 && o.push(e), this
        }
    }, e.once = function(t, e) {
        if (t && e) {
            this.on(t, e);
            var i = this._onceEvents = this._onceEvents || {},
                o = i[t] = i[t] || {};
            return o[e] = !0, this
        }
    }, e.off = function(t, e) {
        var i = this._events && this._events[t];
        if (i && i.length) {
            var o = i.indexOf(e);
            return o != -1 && i.splice(o, 1), this
        }
    }, e.emitEvent = function(t, e) {
        var i = this._events && this._events[t];
        if (i && i.length) {
            i = i.slice(0), e = e || [];
            for (var o = this._onceEvents && this._onceEvents[t], n = 0; n < i.length; n++) {
                var s = i[n],
                    r = o && o[s];
                r && (this.off(t, s), delete o[s]), s.apply(this, e)
            }
            return this
        }
    }, e.allOff = function() {
        delete this._events, delete this._onceEvents
    }, t
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("get-size/get-size", e) : "object" == typeof module && module.exports ? module.exports = e() : t.getSize = e()
}(window, function() {
    "use strict";

    function t(t) {
        var e = parseFloat(t),
            i = t.indexOf("%") == -1 && !isNaN(e);
        return i && e
    }

    function e() {}

    function i() {
        for (var t = {
                width: 0,
                height: 0,
                innerWidth: 0,
                innerHeight: 0,
                outerWidth: 0,
                outerHeight: 0
            }, e = 0; e < h; e++) {
            var i = u[e];
            t[i] = 0
        }
        return t
    }

    function o(t) {
        var e = getComputedStyle(t);
        return e || a("Style returned " + e + ". Are you running this code in a hidden iframe on Firefox? See https://bit.ly/getsizebug1"), e
    }

    function n() {
        if (!d) {
            d = !0;
            var e = document.createElement("div");
            e.style.width = "200px", e.style.padding = "1px 2px 3px 4px", e.style.borderStyle = "solid", e.style.borderWidth = "1px 2px 3px 4px", e.style.boxSizing = "border-box";
            var i = document.body || document.documentElement;
            i.appendChild(e);
            var n = o(e);
            r = 200 == Math.round(t(n.width)), s.isBoxSizeOuter = r, i.removeChild(e)
        }
    }

    function s(e) {
        if (n(), "string" == typeof e && (e = document.querySelector(e)), e && "object" == typeof e && e.nodeType) {
            var s = o(e);
            if ("none" == s.display) return i();
            var a = {};
            a.width = e.offsetWidth, a.height = e.offsetHeight;
            for (var d = a.isBorderBox = "border-box" == s.boxSizing, l = 0; l < h; l++) {
                var f = u[l],
                    c = s[f],
                    m = parseFloat(c);
                a[f] = isNaN(m) ? 0 : m
            }
            var p = a.paddingLeft + a.paddingRight,
                y = a.paddingTop + a.paddingBottom,
                g = a.marginLeft + a.marginRight,
                v = a.marginTop + a.marginBottom,
                _ = a.borderLeftWidth + a.borderRightWidth,
                z = a.borderTopWidth + a.borderBottomWidth,
                I = d && r,
                x = t(s.width);
            x !== !1 && (a.width = x + (I ? 0 : p + _));
            var S = t(s.height);
            return S !== !1 && (a.height = S + (I ? 0 : y + z)), a.innerWidth = a.width - (p + _), a.innerHeight = a.height - (y + z), a.outerWidth = a.width + g, a.outerHeight = a.height + v, a
        }
    }
    var r, a = "undefined" == typeof console ? e : function(t) {
            console.error(t)
        },
        u = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"],
        h = u.length,
        d = !1;
    return s
}),
function(t, e) {
    "use strict";
    "function" == typeof define && define.amd ? define("desandro-matches-selector/matches-selector", e) : "object" == typeof module && module.exports ? module.exports = e() : t.matchesSelector = e()
}(window, function() {
    "use strict";
    var t = function() {
        var t = window.Element.prototype;
        if (t.matches) return "matches";
        if (t.matchesSelector) return "matchesSelector";
        for (var e = ["webkit", "moz", "ms", "o"], i = 0; i < e.length; i++) {
            var o = e[i],
                n = o + "MatchesSelector";
            if (t[n]) return n
        }
    }();
    return function(e, i) {
        return e[t](i)
    }
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("fizzy-ui-utils/utils", ["desandro-matches-selector/matches-selector"], function(i) {
        return e(t, i)
    }) : "object" == typeof module && module.exports ? module.exports = e(t, require("desandro-matches-selector")) : t.fizzyUIUtils = e(t, t.matchesSelector)
}(window, function(t, e) {
    var i = {};
    i.extend = function(t, e) {
        for (var i in e) t[i] = e[i];
        return t
    }, i.modulo = function(t, e) {
        return (t % e + e) % e
    };
    var o = Array.prototype.slice;
    i.makeArray = function(t) {
        if (Array.isArray(t)) return t;
        if (null === t || void 0 === t) return [];
        var e = "object" == typeof t && "number" == typeof t.length;
        return e ? o.call(t) : [t]
    }, i.removeFrom = function(t, e) {
        var i = t.indexOf(e);
        i != -1 && t.splice(i, 1)
    }, i.getParent = function(t, i) {
        for (; t.parentNode && t != document.body;)
            if (t = t.parentNode, e(t, i)) return t
    }, i.getQueryElement = function(t) {
        return "string" == typeof t ? document.querySelector(t) : t
    }, i.handleEvent = function(t) {
        var e = "on" + t.type;
        this[e] && this[e](t)
    }, i.filterFindElements = function(t, o) {
        t = i.makeArray(t);
        var n = [];
        return t.forEach(function(t) {
            if (t instanceof HTMLElement) {
                if (!o) return void n.push(t);
                e(t, o) && n.push(t);
                for (var i = t.querySelectorAll(o), s = 0; s < i.length; s++) n.push(i[s])
            }
        }), n
    }, i.debounceMethod = function(t, e, i) {
        i = i || 100;
        var o = t.prototype[e],
            n = e + "Timeout";
        t.prototype[e] = function() {
            var t = this[n];
            clearTimeout(t);
            var e = arguments,
                s = this;
            this[n] = setTimeout(function() {
                o.apply(s, e), delete s[n]
            }, i)
        }
    }, i.docReady = function(t) {
        var e = document.readyState;
        "complete" == e || "interactive" == e ? setTimeout(t) : document.addEventListener("DOMContentLoaded", t)
    }, i.toDashed = function(t) {
        return t.replace(/(.)([A-Z])/g, function(t, e, i) {
            return e + "-" + i
        }).toLowerCase()
    };
    var n = t.console;
    return i.htmlInit = function(e, o) {
        i.docReady(function() {
            var s = i.toDashed(o),
                r = "data-" + s,
                a = document.querySelectorAll("[" + r + "]"),
                u = document.querySelectorAll(".js-" + s),
                h = i.makeArray(a).concat(i.makeArray(u)),
                d = r + "-options",
                l = t.jQuery;
            h.forEach(function(t) {
                var i, s = t.getAttribute(r) || t.getAttribute(d);
                try {
                    i = s && JSON.parse(s)
                } catch (a) {
                    return void(n && n.error("Error parsing " + r + " on " + t.className + ": " + a))
                }
                var u = new e(t, i);
                l && l.data(t, o, u)
            })
        })
    }, i
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("outlayer/item", ["ev-emitter/ev-emitter", "get-size/get-size"], e) : "object" == typeof module && module.exports ? module.exports = e(require("ev-emitter"), require("get-size")) : (t.Outlayer = {}, t.Outlayer.Item = e(t.EvEmitter, t.getSize))
}(window, function(t, e) {
    "use strict";

    function i(t) {
        for (var e in t) return !1;
        return e = null, !0
    }

    function o(t, e) {
        t && (this.element = t, this.layout = e, this.position = {
            x: 0,
            y: 0
        }, this._create())
    }

    function n(t) {
        return t.replace(/([A-Z])/g, function(t) {
            return "-" + t.toLowerCase()
        })
    }
    var s = document.documentElement.style,
        r = "string" == typeof s.transition ? "transition" : "WebkitTransition",
        a = "string" == typeof s.transform ? "transform" : "WebkitTransform",
        u = {
            WebkitTransition: "webkitTransitionEnd",
            transition: "transitionend"
        }[r],
        h = {
            transform: a,
            transition: r,
            transitionDuration: r + "Duration",
            transitionProperty: r + "Property",
            transitionDelay: r + "Delay"
        },
        d = o.prototype = Object.create(t.prototype);
    d.constructor = o, d._create = function() {
        this._transn = {
            ingProperties: {},
            clean: {},
            onEnd: {}
        }, this.css({
            position: "absolute"
        })
    }, d.handleEvent = function(t) {
        var e = "on" + t.type;
        this[e] && this[e](t)
    }, d.getSize = function() {
        this.size = e(this.element)
    }, d.css = function(t) {
        var e = this.element.style;
        for (var i in t) {
            var o = h[i] || i;
            e[o] = t[i]
        }
    }, d.getPosition = function() {
        var t = getComputedStyle(this.element),
            e = this.layout._getOption("originLeft"),
            i = this.layout._getOption("originTop"),
            o = t[e ? "left" : "right"],
            n = t[i ? "top" : "bottom"],
            s = parseFloat(o),
            r = parseFloat(n),
            a = this.layout.size;
        o.indexOf("%") != -1 && (s = s / 100 * a.width), n.indexOf("%") != -1 && (r = r / 100 * a.height), s = isNaN(s) ? 0 : s, r = isNaN(r) ? 0 : r, s -= e ? a.paddingLeft : a.paddingRight, r -= i ? a.paddingTop : a.paddingBottom, this.position.x = s, this.position.y = r
    }, d.layoutPosition = function() {
        var t = this.layout.size,
            e = {},
            i = this.layout._getOption("originLeft"),
            o = this.layout._getOption("originTop"),
            n = i ? "paddingLeft" : "paddingRight",
            s = i ? "left" : "right",
            r = i ? "right" : "left",
            a = this.position.x + t[n];
        e[s] = this.getXValue(a), e[r] = "";
        var u = o ? "paddingTop" : "paddingBottom",
            h = o ? "top" : "bottom",
            d = o ? "bottom" : "top",
            l = this.position.y + t[u];
        e[h] = this.getYValue(l), e[d] = "", this.css(e), this.emitEvent("layout", [this])
    }, d.getXValue = function(t) {
        var e = this.layout._getOption("horizontal");
        return this.layout.options.percentPosition && !e ? t / this.layout.size.width * 100 + "%" : t + "px"
    }, d.getYValue = function(t) {
        var e = this.layout._getOption("horizontal");
        return this.layout.options.percentPosition && e ? t / this.layout.size.height * 100 + "%" : t + "px"
    }, d._transitionTo = function(t, e) {
        this.getPosition();
        var i = this.position.x,
            o = this.position.y,
            n = t == this.position.x && e == this.position.y;
        if (this.setPosition(t, e), n && !this.isTransitioning) return void this.layoutPosition();
        var s = t - i,
            r = e - o,
            a = {};
        a.transform = this.getTranslate(s, r), this.transition({
            to: a,
            onTransitionEnd: {
                transform: this.layoutPosition
            },
            isCleaning: !0
        })
    }, d.getTranslate = function(t, e) {
        var i = this.layout._getOption("originLeft"),
            o = this.layout._getOption("originTop");
        return t = i ? t : -t, e = o ? e : -e, "translate3d(" + t + "px, " + e + "px, 0)"
    }, d.goTo = function(t, e) {
        this.setPosition(t, e), this.layoutPosition()
    }, d.moveTo = d._transitionTo, d.setPosition = function(t, e) {
        this.position.x = parseFloat(t), this.position.y = parseFloat(e)
    }, d._nonTransition = function(t) {
        this.css(t.to), t.isCleaning && this._removeStyles(t.to);
        for (var e in t.onTransitionEnd) t.onTransitionEnd[e].call(this)
    }, d.transition = function(t) {
        if (!parseFloat(this.layout.options.transitionDuration)) return void this._nonTransition(t);
        var e = this._transn;
        for (var i in t.onTransitionEnd) e.onEnd[i] = t.onTransitionEnd[i];
        for (i in t.to) e.ingProperties[i] = !0, t.isCleaning && (e.clean[i] = !0);
        if (t.from) {
            this.css(t.from);
            var o = this.element.offsetHeight;
            o = null
        }
        this.enableTransition(t.to), this.css(t.to), this.isTransitioning = !0
    };
    var l = "opacity," + n(a);
    d.enableTransition = function() {
        if (!this.isTransitioning) {
            var t = this.layout.options.transitionDuration;
            t = "number" == typeof t ? t + "ms" : t, this.css({
                transitionProperty: l,
                transitionDuration: t,
                transitionDelay: this.staggerDelay || 0
            }), this.element.addEventListener(u, this, !1)
        }
    }, d.onwebkitTransitionEnd = function(t) {
        this.ontransitionend(t)
    }, d.onotransitionend = function(t) {
        this.ontransitionend(t)
    };
    var f = {
        "-webkit-transform": "transform"
    };
    d.ontransitionend = function(t) {
        if (t.target === this.element) {
            var e = this._transn,
                o = f[t.propertyName] || t.propertyName;
            if (delete e.ingProperties[o], i(e.ingProperties) && this.disableTransition(), o in e.clean && (this.element.style[t.propertyName] = "", delete e.clean[o]), o in e.onEnd) {
                var n = e.onEnd[o];
                n.call(this), delete e.onEnd[o]
            }
            this.emitEvent("transitionEnd", [this])
        }
    }, d.disableTransition = function() {
        this.removeTransitionStyles(), this.element.removeEventListener(u, this, !1), this.isTransitioning = !1
    }, d._removeStyles = function(t) {
        var e = {};
        for (var i in t) e[i] = "";
        this.css(e)
    };
    var c = {
        transitionProperty: "",
        transitionDuration: "",
        transitionDelay: ""
    };
    return d.removeTransitionStyles = function() {
        this.css(c)
    }, d.stagger = function(t) {
        t = isNaN(t) ? 0 : t, this.staggerDelay = t + "ms"
    }, d.removeElem = function() {
        this.element.parentNode.removeChild(this.element), this.css({
            display: ""
        }), this.emitEvent("remove", [this])
    }, d.remove = function() {
        return r && parseFloat(this.layout.options.transitionDuration) ? (this.once("transitionEnd", function() {
            this.removeElem()
        }), void this.hide()) : void this.removeElem()
    }, d.reveal = function() {
        delete this.isHidden, this.css({
            display: ""
        });
        var t = this.layout.options,
            e = {},
            i = this.getHideRevealTransitionEndProperty("visibleStyle");
        e[i] = this.onRevealTransitionEnd, this.transition({
            from: t.hiddenStyle,
            to: t.visibleStyle,
            isCleaning: !0,
            onTransitionEnd: e
        })
    }, d.onRevealTransitionEnd = function() {
        this.isHidden || this.emitEvent("reveal")
    }, d.getHideRevealTransitionEndProperty = function(t) {
        var e = this.layout.options[t];
        if (e.opacity) return "opacity";
        for (var i in e) return i
    }, d.hide = function() {
        this.isHidden = !0, this.css({
            display: ""
        });
        var t = this.layout.options,
            e = {},
            i = this.getHideRevealTransitionEndProperty("hiddenStyle");
        e[i] = this.onHideTransitionEnd, this.transition({
            from: t.visibleStyle,
            to: t.hiddenStyle,
            isCleaning: !0,
            onTransitionEnd: e
        })
    }, d.onHideTransitionEnd = function() {
        this.isHidden && (this.css({
            display: "none"
        }), this.emitEvent("hide"))
    }, d.destroy = function() {
        this.css({
            position: "",
            left: "",
            right: "",
            top: "",
            bottom: "",
            transition: "",
            transform: ""
        })
    }, o
}),
function(t, e) {
    "use strict";
    "function" == typeof define && define.amd ? define("outlayer/outlayer", ["ev-emitter/ev-emitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function(i, o, n, s) {
        return e(t, i, o, n, s)
    }) : "object" == typeof module && module.exports ? module.exports = e(t, require("ev-emitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : t.Outlayer = e(t, t.EvEmitter, t.getSize, t.fizzyUIUtils, t.Outlayer.Item)
}(window, function(t, e, i, o, n) {
    "use strict";

    function s(t, e) {
        var i = o.getQueryElement(t);
        if (!i) return void(u && u.error("Bad element for " + this.constructor.namespace + ": " + (i || t)));
        this.element = i, h && (this.$element = h(this.element)), this.options = o.extend({}, this.constructor.defaults), this.option(e);
        var n = ++l;
        this.element.outlayerGUID = n, f[n] = this, this._create();
        var s = this._getOption("initLayout");
        s && this.layout()
    }

    function r(t) {
        function e() {
            t.apply(this, arguments)
        }
        return e.prototype = Object.create(t.prototype), e.prototype.constructor = e, e
    }

    function a(t) {
        if ("number" == typeof t) return t;
        var e = t.match(/(^\d*\.?\d*)(\w*)/),
            i = e && e[1],
            o = e && e[2];
        if (!i.length) return 0;
        i = parseFloat(i);
        var n = m[o] || 1;
        return i * n
    }
    var u = t.console,
        h = t.jQuery,
        d = function() {},
        l = 0,
        f = {};
    s.namespace = "outlayer", s.Item = n, s.defaults = {
        containerStyle: {
            position: "relative"
        },
        initLayout: !0,
        originLeft: !0,
        originTop: !0,
        resize: !0,
        resizeContainer: !0,
        transitionDuration: "0.4s",
        hiddenStyle: {
            opacity: 0,
            transform: "scale(0.001)"
        },
        visibleStyle: {
            opacity: 1,
            transform: "scale(1)"
        }
    };
    var c = s.prototype;
    o.extend(c, e.prototype), c.option = function(t) {
        o.extend(this.options, t)
    }, c._getOption = function(t) {
        var e = this.constructor.compatOptions[t];
        return e && void 0 !== this.options[e] ? this.options[e] : this.options[t]
    }, s.compatOptions = {
        initLayout: "isInitLayout",
        horizontal: "isHorizontal",
        layoutInstant: "isLayoutInstant",
        originLeft: "isOriginLeft",
        originTop: "isOriginTop",
        resize: "isResizeBound",
        resizeContainer: "isResizingContainer"
    }, c._create = function() {
        this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), o.extend(this.element.style, this.options.containerStyle);
        var t = this._getOption("resize");
        t && this.bindResize()
    }, c.reloadItems = function() {
        this.items = this._itemize(this.element.children)
    }, c._itemize = function(t) {
        for (var e = this._filterFindItemElements(t), i = this.constructor.Item, o = [], n = 0; n < e.length; n++) {
            var s = e[n],
                r = new i(s, this);
            o.push(r)
        }
        return o
    }, c._filterFindItemElements = function(t) {
        return o.filterFindElements(t, this.options.itemSelector)
    }, c.getItemElements = function() {
        return this.items.map(function(t) {
            return t.element
        })
    }, c.layout = function() {
        this._resetLayout(), this._manageStamps();
        var t = this._getOption("layoutInstant"),
            e = void 0 !== t ? t : !this._isLayoutInited;
        this.layoutItems(this.items, e), this._isLayoutInited = !0
    }, c._init = c.layout, c._resetLayout = function() {
        this.getSize()
    }, c.getSize = function() {
        this.size = i(this.element)
    }, c._getMeasurement = function(t, e) {
        var o, n = this.options[t];
        n ? ("string" == typeof n ? o = this.element.querySelector(n) : n instanceof HTMLElement && (o = n), this[t] = o ? i(o)[e] : n) : this[t] = 0
    }, c.layoutItems = function(t, e) {
        t = this._getItemsForLayout(t), this._layoutItems(t, e), this._postLayout()
    }, c._getItemsForLayout = function(t) {
        return t.filter(function(t) {
            return !t.isIgnored
        })
    }, c._layoutItems = function(t, e) {
        if (this._emitCompleteOnItems("layout", t), t && t.length) {
            var i = [];
            t.forEach(function(t) {
                var o = this._getItemLayoutPosition(t);
                o.item = t, o.isInstant = e || t.isLayoutInstant, i.push(o)
            }, this), this._processLayoutQueue(i)
        }
    }, c._getItemLayoutPosition = function() {
        return {
            x: 0,
            y: 0
        }
    }, c._processLayoutQueue = function(t) {
        this.updateStagger(), t.forEach(function(t, e) {
            this._positionItem(t.item, t.x, t.y, t.isInstant, e)
        }, this)
    }, c.updateStagger = function() {
        var t = this.options.stagger;
        return null === t || void 0 === t ? void(this.stagger = 0) : (this.stagger = a(t), this.stagger)
    }, c._positionItem = function(t, e, i, o, n) {
        o ? t.goTo(e, i) : (t.stagger(n * this.stagger), t.moveTo(e, i))
    }, c._postLayout = function() {
        this.resizeContainer()
    }, c.resizeContainer = function() {
        var t = this._getOption("resizeContainer");
        if (t) {
            var e = this._getContainerSize();
            e && (this._setContainerMeasure(e.width, !0), this._setContainerMeasure(e.height, !1))
        }
    }, c._getContainerSize = d, c._setContainerMeasure = function(t, e) {
        if (void 0 !== t) {
            var i = this.size;
            i.isBorderBox && (t += e ? i.paddingLeft + i.paddingRight + i.borderLeftWidth + i.borderRightWidth : i.paddingBottom + i.paddingTop + i.borderTopWidth + i.borderBottomWidth), t = Math.max(t, 0), this.element.style[e ? "width" : "height"] = t + "px"
        }
    }, c._emitCompleteOnItems = function(t, e) {
        function i() {
            n.dispatchEvent(t + "Complete", null, [e])
        }

        function o() {
            r++, r == s && i()
        }
        var n = this,
            s = e.length;
        if (!e || !s) return void i();
        var r = 0;
        e.forEach(function(e) {
            e.once(t, o)
        })
    }, c.dispatchEvent = function(t, e, i) {
        var o = e ? [e].concat(i) : i;
        if (this.emitEvent(t, o), h)
            if (this.$element = this.$element || h(this.element), e) {
                var n = h.Event(e);
                n.type = t, this.$element.trigger(n, i)
            } else this.$element.trigger(t, i)
    }, c.ignore = function(t) {
        var e = this.getItem(t);
        e && (e.isIgnored = !0)
    }, c.unignore = function(t) {
        var e = this.getItem(t);
        e && delete e.isIgnored
    }, c.stamp = function(t) {
        t = this._find(t), t && (this.stamps = this.stamps.concat(t), t.forEach(this.ignore, this))
    }, c.unstamp = function(t) {
        t = this._find(t), t && t.forEach(function(t) {
            o.removeFrom(this.stamps, t), this.unignore(t)
        }, this)
    }, c._find = function(t) {
        if (t) return "string" == typeof t && (t = this.element.querySelectorAll(t)), t = o.makeArray(t)
    }, c._manageStamps = function() {
        this.stamps && this.stamps.length && (this._getBoundingRect(), this.stamps.forEach(this._manageStamp, this))
    }, c._getBoundingRect = function() {
        var t = this.element.getBoundingClientRect(),
            e = this.size;
        this._boundingRect = {
            left: t.left + e.paddingLeft + e.borderLeftWidth,
            top: t.top + e.paddingTop + e.borderTopWidth,
            right: t.right - (e.paddingRight + e.borderRightWidth),
            bottom: t.bottom - (e.paddingBottom + e.borderBottomWidth)
        }
    }, c._manageStamp = d, c._getElementOffset = function(t) {
        var e = t.getBoundingClientRect(),
            o = this._boundingRect,
            n = i(t),
            s = {
                left: e.left - o.left - n.marginLeft,
                top: e.top - o.top - n.marginTop,
                right: o.right - e.right - n.marginRight,
                bottom: o.bottom - e.bottom - n.marginBottom
            };
        return s
    }, c.handleEvent = o.handleEvent, c.bindResize = function() {
        t.addEventListener("resize", this), this.isResizeBound = !0
    }, c.unbindResize = function() {
        t.removeEventListener("resize", this), this.isResizeBound = !1
    }, c.onresize = function() {
        this.resize()
    }, o.debounceMethod(s, "onresize", 100), c.resize = function() {
        this.isResizeBound && this.needsResizeLayout() && this.layout()
    }, c.needsResizeLayout = function() {
        var t = i(this.element),
            e = this.size && t;
        return e && t.innerWidth !== this.size.innerWidth
    }, c.addItems = function(t) {
        var e = this._itemize(t);
        return e.length && (this.items = this.items.concat(e)), e
    }, c.appended = function(t) {
        var e = this.addItems(t);
        e.length && (this.layoutItems(e, !0), this.reveal(e))
    }, c.prepended = function(t) {
        var e = this._itemize(t);
        if (e.length) {
            var i = this.items.slice(0);
            this.items = e.concat(i), this._resetLayout(), this._manageStamps(), this.layoutItems(e, !0), this.reveal(e), this.layoutItems(i)
        }
    }, c.reveal = function(t) {
        if (this._emitCompleteOnItems("reveal", t), t && t.length) {
            var e = this.updateStagger();
            t.forEach(function(t, i) {
                t.stagger(i * e), t.reveal()
            })
        }
    }, c.hide = function(t) {
        if (this._emitCompleteOnItems("hide", t), t && t.length) {
            var e = this.updateStagger();
            t.forEach(function(t, i) {
                t.stagger(i * e), t.hide()
            })
        }
    }, c.revealItemElements = function(t) {
        var e = this.getItems(t);
        this.reveal(e)
    }, c.hideItemElements = function(t) {
        var e = this.getItems(t);
        this.hide(e)
    }, c.getItem = function(t) {
        for (var e = 0; e < this.items.length; e++) {
            var i = this.items[e];
            if (i.element == t) return i
        }
    }, c.getItems = function(t) {
        t = o.makeArray(t);
        var e = [];
        return t.forEach(function(t) {
            var i = this.getItem(t);
            i && e.push(i)
        }, this), e
    }, c.remove = function(t) {
        var e = this.getItems(t);
        this._emitCompleteOnItems("remove", e), e && e.length && e.forEach(function(t) {
            t.remove(), o.removeFrom(this.items, t)
        }, this)
    }, c.destroy = function() {
        var t = this.element.style;
        t.height = "", t.position = "", t.width = "", this.items.forEach(function(t) {
            t.destroy()
        }), this.unbindResize();
        var e = this.element.outlayerGUID;
        delete f[e], delete this.element.outlayerGUID, h && h.removeData(this.element, this.constructor.namespace)
    }, s.data = function(t) {
        t = o.getQueryElement(t);
        var e = t && t.outlayerGUID;
        return e && f[e]
    }, s.create = function(t, e) {
        var i = r(s);
        return i.defaults = o.extend({}, s.defaults), o.extend(i.defaults, e), i.compatOptions = o.extend({}, s.compatOptions), i.namespace = t, i.data = s.data, i.Item = r(n), o.htmlInit(i, t), h && h.bridget && h.bridget(t, i), i
    };
    var m = {
        ms: 1,
        s: 1e3
    };
    return s.Item = n, s
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("isotope-layout/js/item", ["outlayer/outlayer"], e) : "object" == typeof module && module.exports ? module.exports = e(require("outlayer")) : (t.Isotope = t.Isotope || {}, t.Isotope.Item = e(t.Outlayer))
}(window, function(t) {
    "use strict";

    function e() {
        t.Item.apply(this, arguments)
    }
    var i = e.prototype = Object.create(t.Item.prototype),
        o = i._create;
    i._create = function() {
        this.id = this.layout.itemGUID++, o.call(this), this.sortData = {}
    }, i.updateSortData = function() {
        if (!this.isIgnored) {
            this.sortData.id = this.id, this.sortData["original-order"] = this.id, this.sortData.random = Math.random();
            var t = this.layout.options.getSortData,
                e = this.layout._sorters;
            for (var i in t) {
                var o = e[i];
                this.sortData[i] = o(this.element, this)
            }
        }
    };
    var n = i.destroy;
    return i.destroy = function() {
        n.apply(this, arguments), this.css({
            display: ""
        })
    }, e
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("isotope-layout/js/layout-mode", ["get-size/get-size", "outlayer/outlayer"], e) : "object" == typeof module && module.exports ? module.exports = e(require("get-size"), require("outlayer")) : (t.Isotope = t.Isotope || {}, t.Isotope.LayoutMode = e(t.getSize, t.Outlayer))
}(window, function(t, e) {
    "use strict";

    function i(t) {
        this.isotope = t, t && (this.options = t.options[this.namespace], this.element = t.element, this.items = t.filteredItems, this.size = t.size)
    }
    var o = i.prototype,
        n = ["_resetLayout", "_getItemLayoutPosition", "_manageStamp", "_getContainerSize", "_getElementOffset", "needsResizeLayout", "_getOption"];
    return n.forEach(function(t) {
        o[t] = function() {
            return e.prototype[t].apply(this.isotope, arguments)
        }
    }), o.needsVerticalResizeLayout = function() {
        var e = t(this.isotope.element),
            i = this.isotope.size && e;
        return i && e.innerHeight != this.isotope.size.innerHeight
    }, o._getMeasurement = function() {
        this.isotope._getMeasurement.apply(this, arguments)
    }, o.getColumnWidth = function() {
        this.getSegmentSize("column", "Width")
    }, o.getRowHeight = function() {
        this.getSegmentSize("row", "Height")
    }, o.getSegmentSize = function(t, e) {
        var i = t + e,
            o = "outer" + e;
        if (this._getMeasurement(i, o), !this[i]) {
            var n = this.getFirstItemSize();
            this[i] = n && n[o] || this.isotope.size["inner" + e]
        }
    }, o.getFirstItemSize = function() {
        var e = this.isotope.filteredItems[0];
        return e && e.element && t(e.element)
    }, o.layout = function() {
        this.isotope.layout.apply(this.isotope, arguments)
    }, o.getSize = function() {
        this.isotope.getSize(), this.size = this.isotope.size
    }, i.modes = {}, i.create = function(t, e) {
        function n() {
            i.apply(this, arguments)
        }
        return n.prototype = Object.create(o), n.prototype.constructor = n, e && (n.options = e), n.prototype.namespace = t, i.modes[t] = n, n
    }, i
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("masonry-layout/masonry", ["outlayer/outlayer", "get-size/get-size"], e) : "object" == typeof module && module.exports ? module.exports = e(require("outlayer"), require("get-size")) : t.Masonry = e(t.Outlayer, t.getSize)
}(window, function(t, e) {
    var i = t.create("masonry");
    i.compatOptions.fitWidth = "isFitWidth";
    var o = i.prototype;
    return o._resetLayout = function() {
        this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns(), this.colYs = [];
        for (var t = 0; t < this.cols; t++) this.colYs.push(0);
        this.maxY = 0, this.horizontalColIndex = 0
    }, o.measureColumns = function() {
        if (this.getContainerWidth(), !this.columnWidth) {
            var t = this.items[0],
                i = t && t.element;
            this.columnWidth = i && e(i).outerWidth || this.containerWidth
        }
        var o = this.columnWidth += this.gutter,
            n = this.containerWidth + this.gutter,
            s = n / o,
            r = o - n % o,
            a = r && r < 1 ? "round" : "floor";
        s = Math[a](s), this.cols = Math.max(s, 1)
    }, o.getContainerWidth = function() {
        var t = this._getOption("fitWidth"),
            i = t ? this.element.parentNode : this.element,
            o = e(i);
        this.containerWidth = o && o.innerWidth
    }, o._getItemLayoutPosition = function(t) {
        t.getSize();
        var e = t.size.outerWidth % this.columnWidth,
            i = e && e < 1 ? "round" : "ceil",
            o = Math[i](t.size.outerWidth / this.columnWidth);
        o = Math.min(o, this.cols);
        for (var n = this.options.horizontalOrder ? "_getHorizontalColPosition" : "_getTopColPosition", s = this[n](o, t), r = {
                x: this.columnWidth * s.col,
                y: s.y
            }, a = s.y + t.size.outerHeight, u = o + s.col, h = s.col; h < u; h++) this.colYs[h] = a;
        return r
    }, o._getTopColPosition = function(t) {
        var e = this._getTopColGroup(t),
            i = Math.min.apply(Math, e);
        return {
            col: e.indexOf(i),
            y: i
        }
    }, o._getTopColGroup = function(t) {
        if (t < 2) return this.colYs;
        for (var e = [], i = this.cols + 1 - t, o = 0; o < i; o++) e[o] = this._getColGroupY(o, t);
        return e
    }, o._getColGroupY = function(t, e) {
        if (e < 2) return this.colYs[t];
        var i = this.colYs.slice(t, t + e);
        return Math.max.apply(Math, i)
    }, o._getHorizontalColPosition = function(t, e) {
        var i = this.horizontalColIndex % this.cols,
            o = t > 1 && i + t > this.cols;
        i = o ? 0 : i;
        var n = e.size.outerWidth && e.size.outerHeight;
        return this.horizontalColIndex = n ? i + t : this.horizontalColIndex, {
            col: i,
            y: this._getColGroupY(i, t)
        }
    }, o._manageStamp = function(t) {
        var i = e(t),
            o = this._getElementOffset(t),
            n = this._getOption("originLeft"),
            s = n ? o.left : o.right,
            r = s + i.outerWidth,
            a = Math.floor(s / this.columnWidth);
        a = Math.max(0, a);
        var u = Math.floor(r / this.columnWidth);
        u -= r % this.columnWidth ? 0 : 1, u = Math.min(this.cols - 1, u);
        for (var h = this._getOption("originTop"), d = (h ? o.top : o.bottom) + i.outerHeight, l = a; l <= u; l++) this.colYs[l] = Math.max(d, this.colYs[l])
    }, o._getContainerSize = function() {
        this.maxY = Math.max.apply(Math, this.colYs);
        var t = {
            height: this.maxY
        };
        return this._getOption("fitWidth") && (t.width = this._getContainerFitWidth()), t
    }, o._getContainerFitWidth = function() {
        for (var t = 0, e = this.cols; --e && 0 === this.colYs[e];) t++;
        return (this.cols - t) * this.columnWidth - this.gutter
    }, o.needsResizeLayout = function() {
        var t = this.containerWidth;
        return this.getContainerWidth(), t != this.containerWidth
    }, i
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("isotope-layout/js/layout-modes/masonry", ["../layout-mode", "masonry-layout/masonry"], e) : "object" == typeof module && module.exports ? module.exports = e(require("../layout-mode"), require("masonry-layout")) : e(t.Isotope.LayoutMode, t.Masonry)
}(window, function(t, e) {
    "use strict";
    var i = t.create("masonry"),
        o = i.prototype,
        n = {
            _getElementOffset: !0,
            layout: !0,
            _getMeasurement: !0
        };
    for (var s in e.prototype) n[s] || (o[s] = e.prototype[s]);
    var r = o.measureColumns;
    o.measureColumns = function() {
        this.items = this.isotope.filteredItems, r.call(this)
    };
    var a = o._getOption;
    return o._getOption = function(t) {
        return "fitWidth" == t ? void 0 !== this.options.isFitWidth ? this.options.isFitWidth : this.options.fitWidth : a.apply(this.isotope, arguments)
    }, i
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("isotope-layout/js/layout-modes/fit-rows", ["../layout-mode"], e) : "object" == typeof exports ? module.exports = e(require("../layout-mode")) : e(t.Isotope.LayoutMode)
}(window, function(t) {
    "use strict";
    var e = t.create("fitRows"),
        i = e.prototype;
    return i._resetLayout = function() {
        this.x = 0, this.y = 0, this.maxY = 0, this._getMeasurement("gutter", "outerWidth")
    }, i._getItemLayoutPosition = function(t) {
        t.getSize();
        var e = t.size.outerWidth + this.gutter,
            i = this.isotope.size.innerWidth + this.gutter;
        0 !== this.x && e + this.x > i && (this.x = 0, this.y = this.maxY);
        var o = {
            x: this.x,
            y: this.y
        };
        return this.maxY = Math.max(this.maxY, this.y + t.size.outerHeight), this.x += e, o
    }, i._getContainerSize = function() {
        return {
            height: this.maxY
        }
    }, e
}),
function(t, e) {
    "function" == typeof define && define.amd ? define("isotope-layout/js/layout-modes/vertical", ["../layout-mode"], e) : "object" == typeof module && module.exports ? module.exports = e(require("../layout-mode")) : e(t.Isotope.LayoutMode)
}(window, function(t) {
    "use strict";
    var e = t.create("vertical", {
            horizontalAlignment: 0
        }),
        i = e.prototype;
    return i._resetLayout = function() {
        this.y = 0
    }, i._getItemLayoutPosition = function(t) {
        t.getSize();
        var e = (this.isotope.size.innerWidth - t.size.outerWidth) * this.options.horizontalAlignment,
            i = this.y;
        return this.y += t.size.outerHeight, {
            x: e,
            y: i
        }
    }, i._getContainerSize = function() {
        return {
            height: this.y
        }
    }, e
}),
function(t, e) {
    "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "desandro-matches-selector/matches-selector", "fizzy-ui-utils/utils", "isotope-layout/js/item", "isotope-layout/js/layout-mode", "isotope-layout/js/layout-modes/masonry", "isotope-layout/js/layout-modes/fit-rows", "isotope-layout/js/layout-modes/vertical"], function(i, o, n, s, r, a) {
        return e(t, i, o, n, s, r, a)
    }) : "object" == typeof module && module.exports ? module.exports = e(t, require("outlayer"), require("get-size"), require("desandro-matches-selector"), require("fizzy-ui-utils"), require("isotope-layout/js/item"), require("isotope-layout/js/layout-mode"), require("isotope-layout/js/layout-modes/masonry"), require("isotope-layout/js/layout-modes/fit-rows"), require("isotope-layout/js/layout-modes/vertical")) : t.Isotope = e(t, t.Outlayer, t.getSize, t.matchesSelector, t.fizzyUIUtils, t.Isotope.Item, t.Isotope.LayoutMode)
}(window, function(t, e, i, o, n, s, r) {
    function a(t, e) {
        return function(i, o) {
            for (var n = 0; n < t.length; n++) {
                var s = t[n],
                    r = i.sortData[s],
                    a = o.sortData[s];
                if (r > a || r < a) {
                    var u = void 0 !== e[s] ? e[s] : e,
                        h = u ? 1 : -1;
                    return (r > a ? 1 : -1) * h
                }
            }
            return 0
        }
    }
    var u = t.jQuery,
        h = String.prototype.trim ? function(t) {
            return t.trim()
        } : function(t) {
            return t.replace(/^\s+|\s+$/g, "")
        },
        d = e.create("isotope", {
            layoutMode: "masonry",
            isJQueryFiltering: !0,
            sortAscending: !0
        });
    d.Item = s, d.LayoutMode = r;
    var l = d.prototype;
    l._create = function() {
        this.itemGUID = 0, this._sorters = {}, this._getSorters(), e.prototype._create.call(this), this.modes = {}, this.filteredItems = this.items, this.sortHistory = ["original-order"];
        for (var t in r.modes) this._initLayoutMode(t)
    }, l.reloadItems = function() {
        this.itemGUID = 0, e.prototype.reloadItems.call(this)
    }, l._itemize = function() {
        for (var t = e.prototype._itemize.apply(this, arguments), i = 0; i < t.length; i++) {
            var o = t[i];
            o.id = this.itemGUID++
        }
        return this._updateItemsSortData(t), t
    }, l._initLayoutMode = function(t) {
        var e = r.modes[t],
            i = this.options[t] || {};
        this.options[t] = e.options ? n.extend(e.options, i) : i, this.modes[t] = new e(this)
    }, l.layout = function() {
        return !this._isLayoutInited && this._getOption("initLayout") ? void this.arrange() : void this._layout()
    }, l._layout = function() {
        var t = this._getIsInstant();
        this._resetLayout(), this._manageStamps(), this.layoutItems(this.filteredItems, t), this._isLayoutInited = !0
    }, l.arrange = function(t) {
        this.option(t), this._getIsInstant();
        var e = this._filter(this.items);
        this.filteredItems = e.matches, this._bindArrangeComplete(), this._isInstant ? this._noTransition(this._hideReveal, [e]) : this._hideReveal(e), this._sort(), this._layout()
    }, l._init = l.arrange, l._hideReveal = function(t) {
        this.reveal(t.needReveal), this.hide(t.needHide)
    }, l._getIsInstant = function() {
        var t = this._getOption("layoutInstant"),
            e = void 0 !== t ? t : !this._isLayoutInited;
        return this._isInstant = e, e
    }, l._bindArrangeComplete = function() {
        function t() {
            e && i && o && n.dispatchEvent("arrangeComplete", null, [n.filteredItems])
        }
        var e, i, o, n = this;
        this.once("layoutComplete", function() {
            e = !0, t()
        }), this.once("hideComplete", function() {
            i = !0, t()
        }), this.once("revealComplete", function() {
            o = !0, t()
        })
    }, l._filter = function(t) {
        var e = this.options.filter;
        e = e || "*";
        for (var i = [], o = [], n = [], s = this._getFilterTest(e), r = 0; r < t.length; r++) {
            var a = t[r];
            if (!a.isIgnored) {
                var u = s(a);
                u && i.push(a), u && a.isHidden ? o.push(a) : u || a.isHidden || n.push(a)
            }
        }
        return {
            matches: i,
            needReveal: o,
            needHide: n
        }
    }, l._getFilterTest = function(t) {
        return u && this.options.isJQueryFiltering ? function(e) {
            return u(e.element).is(t);
        } : "function" == typeof t ? function(e) {
            return t(e.element)
        } : function(e) {
            return o(e.element, t)
        }
    }, l.updateSortData = function(t) {
        var e;
        t ? (t = n.makeArray(t), e = this.getItems(t)) : e = this.items, this._getSorters(), this._updateItemsSortData(e)
    }, l._getSorters = function() {
        var t = this.options.getSortData;
        for (var e in t) {
            var i = t[e];
            this._sorters[e] = f(i)
        }
    }, l._updateItemsSortData = function(t) {
        for (var e = t && t.length, i = 0; e && i < e; i++) {
            var o = t[i];
            o.updateSortData()
        }
    };
    var f = function() {
        function t(t) {
            if ("string" != typeof t) return t;
            var i = h(t).split(" "),
                o = i[0],
                n = o.match(/^\[(.+)\]$/),
                s = n && n[1],
                r = e(s, o),
                a = d.sortDataParsers[i[1]];
            return t = a ? function(t) {
                return t && a(r(t))
            } : function(t) {
                return t && r(t)
            }
        }

        function e(t, e) {
            return t ? function(e) {
                return e.getAttribute(t)
            } : function(t) {
                var i = t.querySelector(e);
                return i && i.textContent
            }
        }
        return t
    }();
    d.sortDataParsers = {
        parseInt: function(t) {
            return parseInt(t, 10)
        },
        parseFloat: function(t) {
            return parseFloat(t)
        }
    }, l._sort = function() {
        if (this.options.sortBy) {
            var t = n.makeArray(this.options.sortBy);
            this._getIsSameSortBy(t) || (this.sortHistory = t.concat(this.sortHistory));
            var e = a(this.sortHistory, this.options.sortAscending);
            this.filteredItems.sort(e)
        }
    }, l._getIsSameSortBy = function(t) {
        for (var e = 0; e < t.length; e++)
            if (t[e] != this.sortHistory[e]) return !1;
        return !0
    }, l._mode = function() {
        var t = this.options.layoutMode,
            e = this.modes[t];
        if (!e) throw new Error("No layout mode: " + t);
        return e.options = this.options[t], e
    }, l._resetLayout = function() {
        e.prototype._resetLayout.call(this), this._mode()._resetLayout()
    }, l._getItemLayoutPosition = function(t) {
        return this._mode()._getItemLayoutPosition(t)
    }, l._manageStamp = function(t) {
        this._mode()._manageStamp(t)
    }, l._getContainerSize = function() {
        return this._mode()._getContainerSize()
    }, l.needsResizeLayout = function() {
        return this._mode().needsResizeLayout()
    }, l.appended = function(t) {
        var e = this.addItems(t);
        if (e.length) {
            var i = this._filterRevealAdded(e);
            this.filteredItems = this.filteredItems.concat(i)
        }
    }, l.prepended = function(t) {
        var e = this._itemize(t);
        if (e.length) {
            this._resetLayout(), this._manageStamps();
            var i = this._filterRevealAdded(e);
            this.layoutItems(this.filteredItems), this.filteredItems = i.concat(this.filteredItems), this.items = e.concat(this.items)
        }
    }, l._filterRevealAdded = function(t) {
        var e = this._filter(t);
        return this.hide(e.needHide), this.reveal(e.matches), this.layoutItems(e.matches, !0), e.matches
    }, l.insert = function(t) {
        var e = this.addItems(t);
        if (e.length) {
            var i, o, n = e.length;
            for (i = 0; i < n; i++) o = e[i], this.element.appendChild(o.element);
            var s = this._filter(e).matches;
            for (i = 0; i < n; i++) e[i].isLayoutInstant = !0;
            for (this.arrange(), i = 0; i < n; i++) delete e[i].isLayoutInstant;
            this.reveal(s)
        }
    };
    var c = l.remove;
    return l.remove = function(t) {
        t = n.makeArray(t);
        var e = this.getItems(t);
        c.call(this, t);
        for (var i = e && e.length, o = 0; i && o < i; o++) {
            var s = e[o];
            n.removeFrom(this.filteredItems, s)
        }
    }, l.shuffle = function() {
        for (var t = 0; t < this.items.length; t++) {
            var e = this.items[t];
            e.sortData.random = Math.random()
        }
        this.options.sortBy = "random", this._sort(), this._layout()
    }, l._noTransition = function(t, e) {
        var i = this.options.transitionDuration;
        this.options.transitionDuration = 0;
        var o = t.apply(this, e);
        return this.options.transitionDuration = i, o
    }, l.getFilteredItemElements = function() {
        return this.filteredItems.map(function(t) {
            return t.element
        })
    }, d
});;
(function($) {
    "use strict";
    if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
        var mobile_device = true;
    } else {
        var mobile_device = false;
    }
    var $window = jQuery(window);
    var is_RTL = jQuery('body').hasClass('rtl') ? true : false;
    jQuery("nav.nav ul li ul").parent("li").addClass("parent-list");
    jQuery(".parent-list").find("a:first").append(" <span class='menu-nav-arrow'><i class='icon-right-open-mini'></i></span>");
    jQuery("nav.nav ul a").removeAttr("title");
    jQuery("nav.nav ul ul").css({
        display: "none"
    });
    jQuery("nav.nav ul li").each(function() {
        var sub_menu = jQuery(this).find("ul:first");
        jQuery(this).hover(function() {
            sub_menu.stop().css({
                overflow: "hidden",
                height: "auto",
                display: "none",
                paddingTop: 0
            }).slideDown(200, function() {
                jQuery(this).css({
                    overflow: "visible",
                    height: "auto"
                });
            });
        }, function() {
            sub_menu.stop().slideUp(50, function() {
                jQuery(this).css({
                    overflow: "hidden",
                    display: "none"
                });
            });
        });
    });
    var fixed_enabled = jQuery("#wrap").hasClass("fixed-enabled");
    if (fixed_enabled && jQuery(".header").length) {
        var hidden_header = jQuery(".hidden-header").offset().top;
        if (hidden_header < 40) {
            var aboveHeight = -20;
        } else {
            var aboveHeight = hidden_header;
        }
        $window.scroll(function() {
            if ($window.scrollTop() > aboveHeight) {
                jQuery(".header").css({
                    "top": "0"
                }).addClass("fixed-nav");
            } else {
                jQuery(".header").css({
                    "top": "auto"
                }).removeClass("fixed-nav");
            }
        });
    } else {
        jQuery(".header").removeClass("fixed-nav");
    }
    jQuery("nav.nav > ul > li").clone().appendTo('.navigation_mobile > ul');
    if (jQuery(".call-action-style_1").length) {
        var action_button = jQuery(".call-action-button").outerHeight();
        var action_content = jQuery(".call-action-style_1 .kodcevap-container").outerHeight();
        jQuery(".call-action-button").css({
            "margin-top": (action_content - action_button) / 2
        });
    }
    if (jQuery(".user-click").length) {
        jQuery(".user-click:not(.user-click-not)").on("click", function() {
            jQuery(".user-notifications.user-notifications-seen").removeClass("user-notifications-seen").find(" > div").slideUp(200);
            jQuery(".user-messages > div").slideUp(200);
            jQuery(this).parent().toggleClass("user-click-open").find(" > ul").slideToggle(200);
        });
    }
    jQuery(".tooltip-n").tipsy({
        fade: true,
        gravity: "s"
    });
    jQuery(".tooltip-s").tipsy({
        fade: true,
        gravity: "n"
    });
    jQuery(".tooltip-nw").tipsy({
        fade: true,
        gravity: "nw"
    });
    jQuery(".tooltip-ne").tipsy({
        fade: true,
        gravity: "ne"
    });
    jQuery(".tooltip-w").tipsy({
        fade: true,
        gravity: "w"
    });
    jQuery(".tooltip-e").tipsy({
        fade: true,
        gravity: "e"
    });
    jQuery(".tooltip-sw").tipsy({
        fade: true,
        gravity: "sw"
    });
    jQuery(".tooltip-se").tipsy({
        fade: true,
        gravity: "se"
    });
    if (jQuery(".user-login-click").length) {
        var user_image = jQuery(".user-login-click .user-image");
        var user_image_h = user_image.outerHeight();
        var user_login = jQuery(".user-login-click .user-login");
        var user_login_h = user_login.outerHeight();
        user_login.css({
            "margin-top": (user_image_h - user_login_h) / 2
        });
        $window.bind("resize", function() {
            var user_image = jQuery(".user-login-click .user-image");
            var user_image_h = user_image.outerHeight();
            var user_login = jQuery(".user-login-click .user-login");
            var user_login_h = user_login.outerHeight();
            user_login.css({
                "margin-top": (user_image_h - user_login_h) / 2
            });
        });
    }
    if (jQuery("nav.nav_menu").length) {
        jQuery(".nav_menu > ul > li > a,.nav_menu > div > ul > li > a").on("click", function() {
            var li_menu = jQuery(this).parent();
            if (li_menu.find(" > ul").length) {
                if (li_menu.hasClass("nav_menu_open")) {
                    li_menu.find(" > ul").slideUp(200, function() {
                        li_menu.removeClass("nav_menu_open");
                    });
                } else {
                    li_menu.find(" > ul").slideDown(200, function() {
                        li_menu.addClass("nav_menu_open");
                    });
                }
                jQuery(".kodcevap-main-wrap,.kodcevap-main-inner,.fixed-sidebar,.fixed_nav_menu").css({
                    "height": "auto"
                });
                return false;
            }
        });
    }
    if (jQuery('.mobile-menu-click').length) {
        jQuery('.mobile-menu-click').each(function() {
            var mobile_menu_click = jQuery(this);
            var mobile_aside = jQuery('.' + mobile_menu_click.data("menu"));
            mobile_aside.find('li.menu-item-has-children').append('<span class="mobile-arrows"><i class="icon-down-open"></i></span>');
            mobile_aside.addClass("asdasdasdasdasdasdas");
            mobile_aside.find('.mobile-aside-close').on('touchstart click', function() {
                mobile_aside.removeClass('mobile-aside-open');
                return false;
            });
            jQuery(mobile_menu_click).on('touchstart click', function() {
                jQuery(".user-notifications.user-notifications-seen").removeClass("user-notifications-seen").find(" > div").slideUp(200);
                jQuery(".user-messages > div").slideUp(200);
                var mobile_open = jQuery(this).data("menu");
                if (jQuery('.' + mobile_open + '.mobile-menu-wrap').hasClass("mobile-aside-open")) {
                    jQuery('.mobile-menu-wrap.' + mobile_open).removeClass('mobile-aside-open');
                } else {
                    jQuery('.' + mobile_open + '.mobile-menu-wrap').addClass('mobile-aside-open');
                }
                jQuery('.mobile-menu-wrap:not(".' + mobile_open + '")').removeClass('mobile-aside-open');
                return false;
            });
            if (mobile_aside.find('ul.menu > li').length) {
                mobile_aside.find('li.menu-item-has-children > a,li.menu-item-has-children > .mobile-arrows').on("touchstart click", function() {
                    jQuery(this).parent().find('ul:first').slideToggle(200);
                    jQuery(this).parent().find('> .mobile-arrows').toggleClass('mobile-arrows-open');
                    return false;
                });
            }
            mobile_aside.find('.mobile-aside-inner').mCustomScrollbar({
                axis: 'y'
            });
        });
    }
    if (jQuery(".post-share").length) {
        var cssArea = (is_RTL == true ? "left" : "right");
        jQuery(".post-share").each(function() {
            var share_width = jQuery(this).find(" > ul").outerWidth() + 20;
            jQuery(this).find(" > ul").css(cssArea, "-" + share_width + "px");
        });
    }
    $window.scroll(function() {
        var cssArea = (is_RTL == true ? "left" : "right");
        if (jQuery(this).scrollTop() > 100) {
            jQuery(".go-up").css(cssArea, "20px");
            jQuery(".ask-button").css(cssArea, (jQuery(".go-up").length ? "70px" : "20px"));
        } else {
            jQuery(".go-up").css(cssArea, "-60px");
            jQuery(".ask-button").css(cssArea, "20px");
        }
    });
    jQuery(".go-up").on("click", function() {
        jQuery("html,body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    if (jQuery(".widget ul.tabs").length) {
        jQuery(".widget ul.tabs").tabs(".widget .tab-inner-wrap", {
            effect: "slide",
            fadeInSpeed: 100
        });
    }
    if (jQuery("ul.tabs-box").length) {
        jQuery("ul.tabs-box").tabs(".tab-inner-wrap-box", {
            effect: "slide",
            fadeInSpeed: 100
        });
    }
    if (jQuery(".slider-owl").length) {
        jQuery(".slider-owl").each(function() {
            var $slider = jQuery(this);
            var $slider_item = $slider.find('.slider-item').length;
            $slider.find('.slider-item').css({
                "height": "auto"
            });
            if ($slider.find('img').length) {
                var $slider = jQuery(this).imagesLoaded(function() {
                    $slider.owlCarousel({
                        autoplay: 5000,
                        margin: 10,
                        responsive: {
                            0: {
                                items: 1
                            }
                        },
                        autoplayHoverPause: true,
                        navText: ["", ""],
                        nav: ($slider_item > 1) ? true : false,
                        rtl: is_RTL,
                        loop: ($slider_item > 1) ? true : false,
                        autoHeight: true
                    });
                });
            } else {
                $slider.owlCarousel({
                    autoplay: 5000,
                    margin: 10,
                    responsive: {
                        0: {
                            items: 1
                        }
                    },
                    autoplayHoverPause: true,
                    navText: ["", ""],
                    nav: ($slider_item > 1) ? true : false,
                    rtl: is_RTL == true,
                    loop: ($slider_item > 1) ? true : false,
                    autoHeight: true
                });
            }
        });
    }
    if (jQuery(".accordion").length) {
        jQuery(".accordion .accordion-title").each(function() {
            jQuery(this).on("click", function() {
                if (jQuery(this).parent().parent().hasClass("toggle-accordion")) {
                    jQuery(this).parent().find("li:first .accordion-title").addClass("active");
                    jQuery(this).parent().find("li:first .accordion-title").next(".accordion-inner").addClass("active");
                    jQuery(this).toggleClass("active");
                    jQuery(this).next(".accordion-inner").slideToggle(200).toggleClass("active");
                    jQuery(this).find("i").toggleClass("icon-minus").toggleClass("icon-plus");
                } else {
                    if (jQuery(this).next().is(":hidden")) {
                        jQuery(this).parent().parent().find(".accordion-title").removeClass("active").next().slideUp(200);
                        jQuery(this).parent().parent().find(".accordion-title").next().removeClass("active").slideUp(200);
                        jQuery(this).toggleClass("active").next().slideDown(200);
                        jQuery(this).next(".accordion-inner").toggleClass("active");
                        jQuery(this).parent().parent().find("i").removeClass("icon-plus").addClass("icon-minus");
                        jQuery(this).find("i").removeClass("icon-minus").addClass("icon-plus");
                    }
                }
                jQuery(".kodcevap-main-wrap,.kodcevap-main-inner,.fixed-sidebar,.fixed_nav_menu").css({
                    "height": "auto"
                });
                return false;
            });
        });
    }
    if (jQuery("ul.menu.flex").length) {
        jQuery('ul.menu.flex').flexMenu({
            threshold: 0,
            cutoff: 0,
            linkText: '<i class="icon-dot-3"></i>',
            linkTextAll: '<i class="icon-dot-3"></i>',
            linkTitle: '',
            linkTitleAll: '',
            showOnHover: ($window.width() > 991 ? true : false),
        });
        jQuery("ul.menu.flex .active-tab,ul.menu.flex .active").closest(".menu-tabs").addClass("active-menu");
    }
    if (jQuery("nav.nav ul").length) {
        jQuery('nav.nav ul').flexMenu({
            threshold: 0,
            cutoff: 0,
            linkText: '<i class="icon-dot-3"></i>',
            linkTextAll: '<i class="icon-dot-3"></i>',
            linkTitle: '',
            linkTitleAll: '',
            showOnHover: ($window.width() > 991 ? true : false),
        });
        jQuery("nav.nav ul .active-tab").parent().parent().addClass("active-menu");
    }
    if (jQuery(".widget select").length) {
        jQuery(".widget select").wrap('<div class="styled-select"></div>');
    }
    if (jQuery(".active-lightbox").length) {
        var lightboxArgs = {
            animation_speed: "fast",
            overlay_gallery: true,
            autoplay_slideshow: false,
            slideshow: 5000,
            theme: "pp_default",
            opacity: 0.8,
            show_title: false,
            social_tools: "",
            deeplinking: false,
            allow_resize: true,
            counter_separator_label: "/",
            default_width: 940,
            default_height: 529
        };
        jQuery("a[href$=jpg], a[href$=JPG], a[href$=jpeg], a[href$=JPEG], a[href$=png], a[href$=gif], a[href$=bmp]:has(img)").prettyPhoto(lightboxArgs);
        jQuery("a[class^='prettyPhoto'], a[rel^='prettyPhoto']").prettyPhoto(lightboxArgs);
    }
    if (jQuery(".article-question.post-with-columns").length) {
        if (jQuery(".article-question.post-with-columns.question-masonry").length) {
            jQuery(".question-articles").isotope({
                filter: "*",
                animationOptions: {
                    duration: 750,
                    itemSelector: '.question-masonry',
                    easing: "linear",
                    queue: false,
                }
            });
        } else {
            jQuery(".article-question.post-with-columns").matchHeight();
            jQuery(".article-question.post-with-columns > .single-inner-content").matchHeight();
        }
    }
    $window.load(function() {
        jQuery(".loader").fadeOut(500);
        if (jQuery(".user-section-grid,.user-section-simple").length) {
            if (jQuery(".users-masonry").length) {
                jQuery(".users-masonry").isotope({
                    filter: "*",
                    animationOptions: {
                        duration: 750,
                        itemSelector: '.user-masonry',
                        easing: "linear",
                        queue: false,
                    }
                });
            } else {
                jQuery('.user-section-grid,.user-section-simple').each(function() {
                    jQuery(this).find('> div > div').matchHeight();
                });
            }
        }
        if (jQuery(".user-section-columns").length) {
            if (jQuery(".users-masonry").length) {
                jQuery(".users-masonry").isotope({
                    filter: "*",
                    animationOptions: {
                        duration: 750,
                        itemSelector: '.user-masonry',
                        easing: "linear",
                        queue: false,
                    }
                });
            } else {
                jQuery('.user-section-columns').each(function() {
                    jQuery(this).find('.post-inner').matchHeight();
                });
            }
        }
        if (jQuery(".badge-section,.tag-sections,.points-section ul .point-section").length) {
            jQuery(".badge-section > *,.tag-sections,.points-section ul .point-section").matchHeight();
        }
        if (jQuery(".article-question.post-with-columns").length) {
            if (jQuery(".article-question.post-with-columns.question-masonry").length) {
                jQuery(".question-articles").imagesLoaded(function() {
                    jQuery(".question-articles").isotope({
                        filter: "*",
                        animationOptions: {
                            duration: 750,
                            itemSelector: '.question-masonry',
                            easing: "linear",
                            queue: false,
                        }
                    });
                });
            } else {
                jQuery(".article-question.post-with-columns").matchHeight();
                jQuery(".article-question.post-with-columns > .single-inner-content").matchHeight();
            }
        }
        var sticky_sidebar = jQuery(".single-question .question-sticky");
        if (sticky_sidebar.length && $window.width() > 480) {
            jQuery(".single-question .question-vote-sticky").css({
                "width": sticky_sidebar.outerWidth()
            });
            jQuery('.single-question .question-vote-sticky').theiaStickySidebar({
                updateSidebarHeight: false,
                additionalMarginTop: (jQuery("#wrap.fixed-enabled").length ? jQuery(".hidden-header").outerHeight() : 0) + 40,
                minWidth: sticky_sidebar.outerWidth()
            });
        }
        if (jQuery(".question-header-mobile").length) {
            $window.bind("resize", function() {
                if (jQuery(this).width() < 480) {
                    if (jQuery(".question-header-mobile").length) {
                        jQuery(".article-question").each(function() {
                            var question_mobile_h = jQuery(this).find(".question-header-mobile").outerHeight() - 20;
                            var author_image_h = jQuery(this).find(".author-image").outerHeight();
                            jQuery(this).find(".author-image").css({
                                "margin-top": (question_mobile_h - author_image_h) / 2
                            });
                        });
                    }
                } else {
                    jQuery(".article-question .author-image,.question-image-vote,.question-image-vote .theiaStickySidebar").removeAttr("style");
                    jQuery(".article-question .author-image").css({
                        "width": "46px"
                    });
                    if (sticky_sidebar.length) {
                        jQuery(".single-question .question-image-vote").css({
                            "width": sticky_sidebar.outerWidth()
                        });
                        jQuery('.single-question .question-image-vote').theiaStickySidebar({
                            updateSidebarHeight: false,
                            additionalMarginTop: (jQuery("#wrap.fixed-enabled").length ? jQuery(".hidden-header").outerHeight() : 0) + 40,
                            minWidth: sticky_sidebar.outerWidth()
                        });
                    }
                }
            });
            if ($window.width() < 480) {
                if (jQuery(".question-header-mobile").length) {
                    jQuery(".article-question").each(function() {
                        var question_mobile_h = jQuery(this).find(".question-header-mobile").outerHeight() - 20;
                        var author_image_h = jQuery(this).find(".author-image").outerHeight();
                        jQuery(this).find(".author-image").css({
                            "margin-top": (question_mobile_h - author_image_h) / 2
                        });
                    });
                }
            }
        }
        if ($window.width() > 991 && jQuery("section .question-articles > .article-question").length > 3 && jQuery("section .question-articles > .article-question .author-image-pop-2").length) {
            var last_question_h = jQuery("section .question-articles > .article-question:last-child").height();
            var last_popup_h = jQuery("section .question-articles > .article-question:last-child .author-image-pop-2").height();
            if (last_question_h < last_popup_h) {
                jQuery("section .question-articles > .article-question:last-child .author-image-pop-2").addClass("author-image-pop-top");
            }
            if (jQuery("section .question-articles > .article-question:last-child .question-bottom > .commentlist").length) {
                var last_question_answer_h = jQuery("section .question-articles > .article-question:last-child .question-bottom > .commentlist .comment").height();
                var last_answer_popup_h = jQuery("section .question-articles > .article-question:last-child .question-bottom > .commentlist .comment .author-image-pop-2").height();
                if (last_question_answer_h < last_answer_popup_h) {
                    jQuery("section .question-articles > .article-question:last-child .question-bottom > .commentlist .comment .author-image-pop-2").addClass("author-image-pop-top");
                }
            }
        }
        if ($window.width() > 991 && jQuery(".page-content.commentslist > ol > .comment").length > 3 && jQuery(".page-content.commentslist > ol > .comment .author-image-pop-2").length) {
            var last_answer_h = jQuery(".page-content.commentslist > ol > .comment:last-child").height();
            var last_popup_h = jQuery(".page-content.commentslist > ol > .comment:last-child .author-image-pop-2").height();
            if (last_answer_h < last_popup_h) {
                jQuery(".page-content.commentslist > ol > .comment:last-child .author-image-pop-2").addClass("author-image-pop-top");
            }
        }
    });
})(jQuery);
jQuery.noConflict()(function discy_sidebar() {
    var main_wrap_h = jQuery(".kodcevap-main-wrap").outerHeight();
    var main_sidebar_h = jQuery(".inner-sidebar").outerHeight();
    if (jQuery(".nav_menu_sidebar").length) {
        var nav_menu_h = jQuery(".nav_menu_sidebar").outerHeight();
        jQuery('.kodcevap-main-wrap,.nav_menu_sidebar').matchHeight();
    } else {
        var nav_menu_h = jQuery(".nav_menu").outerHeight();
    }
    if (jQuery('.menu_left').length && nav_menu_h > main_wrap_h) {
        jQuery('.kodcevap-main-inner,nav.nav_menu,div.nav_menu_sidebar').matchHeight();
    } else if ((main_wrap_h > nav_menu_h && jQuery(".fixed_nav_menu").length) || (main_wrap_h > main_sidebar_h && jQuery(".fixed-sidebar").length)) {
        if (jQuery(".fixed_nav_menu").length) {
            jQuery('.kodcevap-main-wrap,.fixed_nav_menu').theiaStickySidebar({
                updateSidebarHeight: (jQuery(".widget-footer").length ? false : true),
                additionalMarginTop: (jQuery("#wrap.fixed-enabled").length ? jQuery(".hidden-header").outerHeight() : 0) + jQuery(".admin-bar #wpadminbar").outerHeight() + 30
            });
        }
        if (jQuery(".fixed-sidebar").length) {
            jQuery('.kodcevap-main-wrap,.fixed-sidebar').theiaStickySidebar({
                updateSidebarHeight: (jQuery(".widget-footer").length ? false : true),
                additionalMarginTop: (jQuery("#wrap.fixed-enabled").length ? jQuery(".hidden-header").outerHeight() : 0) + jQuery(".admin-bar #wpadminbar").outerHeight()
            });
        }
    }
});;
! function(d, l) {
    "use strict";
    var e = !1,
        o = !1;
    if (l.querySelector)
        if (d.addEventListener) e = !0;
    if (d.wp = d.wp || {}, !d.wp.receiveEmbedMessage)
        if (d.wp.receiveEmbedMessage = function(e) {
                var t = e.data;
                if (t)
                    if (t.secret || t.message || t.value)
                        if (!/[^a-zA-Z0-9]/.test(t.secret)) {
                            var r, a, i, s, n, o = l.querySelectorAll('iframe[data-secret="' + t.secret + '"]'),
                                c = l.querySelectorAll('blockquote[data-secret="' + t.secret + '"]');
                            for (r = 0; r < c.length; r++) c[r].style.display = "none";
                            for (r = 0; r < o.length; r++)
                                if (a = o[r], e.source === a.contentWindow) {
                                    if (a.removeAttribute("style"), "height" === t.message) {
                                        if (1e3 < (i = parseInt(t.value, 10))) i = 1e3;
                                        else if (~~i < 200) i = 200;
                                        a.height = i
                                    }
                                    if ("link" === t.message)
                                        if (s = l.createElement("a"), n = l.createElement("a"), s.href = a.getAttribute("src"), n.href = t.value, n.host === s.host)
                                            if (l.activeElement === a) d.top.location.href = t.value
                                }
                        }
            }, e) d.addEventListener("message", d.wp.receiveEmbedMessage, !1), l.addEventListener("DOMContentLoaded", t, !1), d.addEventListener("load", t, !1);
    function t() {
        if (!o) {
            o = !0;
            var e, t, r, a, i = -1 !== navigator.appVersion.indexOf("MSIE 10"),
                s = !!navigator.userAgent.match(/Trident.*rv:11\./),
                n = l.querySelectorAll("iframe.wp-embedded-content");
            for (t = 0; t < n.length; t++) {
                if (!(r = n[t]).getAttribute("data-secret")) a = Math.random().toString(36).substr(2, 10), r.src += "#?secret=" + a, r.setAttribute("data-secret", a);
                if (i || s)(e = r.cloneNode(!0)).removeAttribute("security"), r.parentNode.replaceChild(e, r)
            }
        }
    }
}(window, document);;
(function() {
    function r() {}
    var n = this,
        t = n._,
        e = Array.prototype,
        o = Object.prototype,
        u = Function.prototype,
        i = e.push,
        c = e.slice,
        s = o.toString,
        a = o.hasOwnProperty,
        f = Array.isArray,
        l = Object.keys,
        p = u.bind,
        h = Object.create,
        v = function(n) {
            return n instanceof v ? n : this instanceof v ? void(this._wrapped = n) : new v(n)
        };
    "undefined" != typeof exports ? ("undefined" != typeof module && module.exports && (exports = module.exports = v), exports._ = v) : n._ = v, v.VERSION = "1.8.3";
    var y = function(u, i, n) {
            if (void 0 === i) return u;
            switch (null == n ? 3 : n) {
                case 1:
                    return function(n) {
                        return u.call(i, n)
                    };
                case 2:
                    return function(n, t) {
                        return u.call(i, n, t)
                    };
                case 3:
                    return function(n, t, r) {
                        return u.call(i, n, t, r)
                    };
                case 4:
                    return function(n, t, r, e) {
                        return u.call(i, n, t, r, e)
                    }
            }
            return function() {
                return u.apply(i, arguments)
            }
        },
        d = function(n, t, r) {
            return null == n ? v.identity : v.isFunction(n) ? y(n, t, r) : v.isObject(n) ? v.matcher(n) : v.property(n)
        };
    v.iteratee = function(n, t) {
        return d(n, t, 1 / 0)
    };

    function g(c, f) {
        return function(n) {
            var t = arguments.length;
            if (t < 2 || null == n) return n;
            for (var r = 1; r < t; r++)
                for (var e = arguments[r], u = c(e), i = u.length, o = 0; o < i; o++) {
                    var a = u[o];
                    f && void 0 !== n[a] || (n[a] = e[a])
                }
            return n
        }
    }

    function m(n) {
        if (!v.isObject(n)) return {};
        if (h) return h(n);
        r.prototype = n;
        var t = new r;
        return r.prototype = null, t
    }

    function b(t) {
        return function(n) {
            return null == n ? void 0 : n[t]
        }
    }
    var x = Math.pow(2, 53) - 1,
        _ = b("length"),
        j = function(n) {
            var t = _(n);
            return "number" == typeof t && 0 <= t && t <= x
        };

    function w(a) {
        return function(n, t, r, e) {
            t = y(t, e, 4);
            var u = !j(n) && v.keys(n),
                i = (u || n).length,
                o = 0 < a ? 0 : i - 1;
            return arguments.length < 3 && (r = n[u ? u[o] : o], o += a),
                function(n, t, r, e, u, i) {
                    for (; 0 <= u && u < i; u += a) {
                        var o = e ? e[u] : u;
                        r = t(r, n[o], o, n)
                    }
                    return r
                }(n, t, r, u, o, i)
        }
    }
    v.each = v.forEach = function(n, t, r) {
        var e, u;
        if (t = y(t, r), j(n))
            for (e = 0, u = n.length; e < u; e++) t(n[e], e, n);
        else {
            var i = v.keys(n);
            for (e = 0, u = i.length; e < u; e++) t(n[i[e]], i[e], n)
        }
        return n
    }, v.map = v.collect = function(n, t, r) {
        t = d(t, r);
        for (var e = !j(n) && v.keys(n), u = (e || n).length, i = Array(u), o = 0; o < u; o++) {
            var a = e ? e[o] : o;
            i[o] = t(n[a], a, n)
        }
        return i
    }, v.reduce = v.foldl = v.inject = w(1), v.reduceRight = v.foldr = w(-1), v.find = v.detect = function(n, t, r) {
        var e;
        if (void 0 !== (e = j(n) ? v.findIndex(n, t, r) : v.findKey(n, t, r)) && -1 !== e) return n[e]
    }, v.filter = v.select = function(n, e, t) {
        var u = [];
        return e = d(e, t), v.each(n, function(n, t, r) {
            e(n, t, r) && u.push(n)
        }), u
    }, v.reject = function(n, t, r) {
        return v.filter(n, v.negate(d(t)), r)
    }, v.every = v.all = function(n, t, r) {
        t = d(t, r);
        for (var e = !j(n) && v.keys(n), u = (e || n).length, i = 0; i < u; i++) {
            var o = e ? e[i] : i;
            if (!t(n[o], o, n)) return !1
        }
        return !0
    }, v.some = v.any = function(n, t, r) {
        t = d(t, r);
        for (var e = !j(n) && v.keys(n), u = (e || n).length, i = 0; i < u; i++) {
            var o = e ? e[i] : i;
            if (t(n[o], o, n)) return !0
        }
        return !1
    }, v.contains = v.includes = v.include = function(n, t, r, e) {
        return j(n) || (n = v.values(n)), "number" == typeof r && !e || (r = 0), 0 <= v.indexOf(n, t, r)
    }, v.invoke = function(n, r) {
        var e = c.call(arguments, 2),
            u = v.isFunction(r);
        return v.map(n, function(n) {
            var t = u ? r : n[r];
            return null == t ? t : t.apply(n, e)
        })
    }, v.pluck = function(n, t) {
        return v.map(n, v.property(t))
    }, v.where = function(n, t) {
        return v.filter(n, v.matcher(t))
    }, v.findWhere = function(n, t) {
        return v.find(n, v.matcher(t))
    }, v.max = function(n, e, t) {
        var r, u, i = -1 / 0,
            o = -1 / 0;
        if (null == e && null != n)
            for (var a = 0, c = (n = j(n) ? n : v.values(n)).length; a < c; a++) r = n[a], i < r && (i = r);
        else e = d(e, t), v.each(n, function(n, t, r) {
            u = e(n, t, r), (o < u || u === -1 / 0 && i === -1 / 0) && (i = n, o = u)
        });
        return i
    }, v.min = function(n, e, t) {
        var r, u, i = 1 / 0,
            o = 1 / 0;
        if (null == e && null != n)
            for (var a = 0, c = (n = j(n) ? n : v.values(n)).length; a < c; a++)(r = n[a]) < i && (i = r);
        else e = d(e, t), v.each(n, function(n, t, r) {
            ((u = e(n, t, r)) < o || u === 1 / 0 && i === 1 / 0) && (i = n, o = u)
        });
        return i
    }, v.shuffle = function(n) {
        for (var t, r = j(n) ? n : v.values(n), e = r.length, u = Array(e), i = 0; i < e; i++)(t = v.random(0, i)) !== i && (u[i] = u[t]), u[t] = r[i];
        return u
    }, v.sample = function(n, t, r) {
        return null == t || r ? (j(n) || (n = v.values(n)), n[v.random(n.length - 1)]) : v.shuffle(n).slice(0, Math.max(0, t))
    }, v.sortBy = function(n, e, t) {
        return e = d(e, t), v.pluck(v.map(n, function(n, t, r) {
            return {
                value: n,
                index: t,
                criteria: e(n, t, r)
            }
        }).sort(function(n, t) {
            var r = n.criteria,
                e = t.criteria;
            if (r !== e) {
                if (e < r || void 0 === r) return 1;
                if (r < e || void 0 === e) return -1
            }
            return n.index - t.index
        }), "value")
    };

    function A(o) {
        return function(e, u, n) {
            var i = {};
            return u = d(u, n), v.each(e, function(n, t) {
                var r = u(n, t, e);
                o(i, n, r)
            }), i
        }
    }
    v.groupBy = A(function(n, t, r) {
        v.has(n, r) ? n[r].push(t) : n[r] = [t]
    }), v.indexBy = A(function(n, t, r) {
        n[r] = t
    }), v.countBy = A(function(n, t, r) {
        v.has(n, r) ? n[r]++ : n[r] = 1
    }), v.toArray = function(n) {
        return n ? v.isArray(n) ? c.call(n) : j(n) ? v.map(n, v.identity) : v.values(n) : []
    }, v.size = function(n) {
        return null == n ? 0 : j(n) ? n.length : v.keys(n).length
    }, v.partition = function(n, e, t) {
        e = d(e, t);
        var u = [],
            i = [];
        return v.each(n, function(n, t, r) {
            (e(n, t, r) ? u : i).push(n)
        }), [u, i]
    }, v.first = v.head = v.take = function(n, t, r) {
        if (null != n) return null == t || r ? n[0] : v.initial(n, n.length - t)
    }, v.initial = function(n, t, r) {
        return c.call(n, 0, Math.max(0, n.length - (null == t || r ? 1 : t)))
    }, v.last = function(n, t, r) {
        if (null != n) return null == t || r ? n[n.length - 1] : v.rest(n, Math.max(0, n.length - t))
    }, v.rest = v.tail = v.drop = function(n, t, r) {
        return c.call(n, null == t || r ? 1 : t)
    }, v.compact = function(n) {
        return v.filter(n, v.identity)
    };
    var O = function(n, t, r, e) {
        for (var u = [], i = 0, o = e || 0, a = _(n); o < a; o++) {
            var c = n[o];
            if (j(c) && (v.isArray(c) || v.isArguments(c))) {
                t || (c = O(c, t, r));
                var f = 0,
                    l = c.length;
                for (u.length += l; f < l;) u[i++] = c[f++]
            } else r || (u[i++] = c)
        }
        return u
    };

    function k(i) {
        return function(n, t, r) {
            t = d(t, r);
            for (var e = _(n), u = 0 < i ? 0 : e - 1; 0 <= u && u < e; u += i)
                if (t(n[u], u, n)) return u;
            return -1
        }
    }

    function F(i, o, a) {
        return function(n, t, r) {
            var e = 0,
                u = _(n);
            if ("number" == typeof r) 0 < i ? e = 0 <= r ? r : Math.max(r + u, e) : u = 0 <= r ? Math.min(r + 1, u) : r + u + 1;
            else if (a && r && u) return n[r = a(n, t)] === t ? r : -1;
            if (t != t) return 0 <= (r = o(c.call(n, e, u), v.isNaN)) ? r + e : -1;
            for (r = 0 < i ? e : u - 1; 0 <= r && r < u; r += i)
                if (n[r] === t) return r;
            return -1
        }
    }
    v.flatten = function(n, t) {
        return O(n, t, !1)
    }, v.without = function(n) {
        return v.difference(n, c.call(arguments, 1))
    }, v.uniq = v.unique = function(n, t, r, e) {
        v.isBoolean(t) || (e = r, r = t, t = !1), null != r && (r = d(r, e));
        for (var u = [], i = [], o = 0, a = _(n); o < a; o++) {
            var c = n[o],
                f = r ? r(c, o, n) : c;
            t ? (o && i === f || u.push(c), i = f) : r ? v.contains(i, f) || (i.push(f), u.push(c)) : v.contains(u, c) || u.push(c)
        }
        return u
    }, v.union = function() {
        return v.uniq(O(arguments, !0, !0))
    }, v.intersection = function(n) {
        for (var t = [], r = arguments.length, e = 0, u = _(n); e < u; e++) {
            var i = n[e];
            if (!v.contains(t, i)) {
                for (var o = 1; o < r && v.contains(arguments[o], i); o++);
                o === r && t.push(i)
            }
        }
        return t
    }, v.difference = function(n) {
        var t = O(arguments, !0, !0, 1);
        return v.filter(n, function(n) {
            return !v.contains(t, n)
        })
    }, v.zip = function() {
        return v.unzip(arguments)
    }, v.unzip = function(n) {
        for (var t = n && v.max(n, _).length || 0, r = Array(t), e = 0; e < t; e++) r[e] = v.pluck(n, e);
        return r
    }, v.object = function(n, t) {
        for (var r = {}, e = 0, u = _(n); e < u; e++) t ? r[n[e]] = t[e] : r[n[e][0]] = n[e][1];
        return r
    }, v.findIndex = k(1), v.findLastIndex = k(-1), v.sortedIndex = function(n, t, r, e) {
        for (var u = (r = d(r, e, 1))(t), i = 0, o = _(n); i < o;) {
            var a = Math.floor((i + o) / 2);
            r(n[a]) < u ? i = a + 1 : o = a
        }
        return i
    }, v.indexOf = F(1, v.findIndex, v.sortedIndex), v.lastIndexOf = F(-1, v.findLastIndex), v.range = function(n, t, r) {
        null == t && (t = n || 0, n = 0), r = r || 1;
        for (var e = Math.max(Math.ceil((t - n) / r), 0), u = Array(e), i = 0; i < e; i++, n += r) u[i] = n;
        return u
    };

    function S(n, t, r, e, u) {
        if (!(e instanceof t)) return n.apply(r, u);
        var i = m(n.prototype),
            o = n.apply(i, u);
        return v.isObject(o) ? o : i
    }
    v.bind = function(n, t) {
        if (p && n.bind === p) return p.apply(n, c.call(arguments, 1));
        if (!v.isFunction(n)) throw new TypeError("Bind must be called on a function");
        var r = c.call(arguments, 2),
            e = function() {
                return S(n, e, t, this, r.concat(c.call(arguments)))
            };
        return e
    }, v.partial = function(u) {
        var i = c.call(arguments, 1),
            o = function() {
                for (var n = 0, t = i.length, r = Array(t), e = 0; e < t; e++) r[e] = i[e] === v ? arguments[n++] : i[e];
                for (; n < arguments.length;) r.push(arguments[n++]);
                return S(u, o, this, this, r)
            };
        return o
    }, v.bindAll = function(n) {
        var t, r, e = arguments.length;
        if (e <= 1) throw new Error("bindAll must be passed function names");
        for (t = 1; t < e; t++) n[r = arguments[t]] = v.bind(n[r], n);
        return n
    }, v.memoize = function(e, u) {
        var i = function(n) {
            var t = i.cache,
                r = "" + (u ? u.apply(this, arguments) : n);
            return v.has(t, r) || (t[r] = e.apply(this, arguments)), t[r]
        };
        return i.cache = {}, i
    }, v.delay = function(n, t) {
        var r = c.call(arguments, 2);
        return setTimeout(function() {
            return n.apply(null, r)
        }, t)
    }, v.defer = v.partial(v.delay, v, 1), v.throttle = function(r, e, u) {
        var i, o, a, c = null,
            f = 0;
        u = u || {};

        function l() {
            f = !1 === u.leading ? 0 : v.now(), c = null, a = r.apply(i, o), c || (i = o = null)
        }
        return function() {
            var n = v.now();
            f || !1 !== u.leading || (f = n);
            var t = e - (n - f);
            return i = this, o = arguments, t <= 0 || e < t ? (c && (clearTimeout(c), c = null), f = n, a = r.apply(i, o), c || (i = o = null)) : c || !1 === u.trailing || (c = setTimeout(l, t)), a
        }
    }, v.debounce = function(t, r, e) {
        var u, i, o, a, c, f = function() {
            var n = v.now() - a;
            n < r && 0 <= n ? u = setTimeout(f, r - n) : (u = null, e || (c = t.apply(o, i), u || (o = i = null)))
        };
        return function() {
            o = this, i = arguments, a = v.now();
            var n = e && !u;
            return u = u || setTimeout(f, r), n && (c = t.apply(o, i), o = i = null), c
        }
    }, v.wrap = function(n, t) {
        return v.partial(t, n)
    }, v.negate = function(n) {
        return function() {
            return !n.apply(this, arguments)
        }
    }, v.compose = function() {
        var r = arguments,
            e = r.length - 1;
        return function() {
            for (var n = e, t = r[e].apply(this, arguments); n--;) t = r[n].call(this, t);
            return t
        }
    }, v.after = function(n, t) {
        return function() {
            if (--n < 1) return t.apply(this, arguments)
        }
    }, v.before = function(n, t) {
        var r;
        return function() {
            return 0 < --n && (r = t.apply(this, arguments)), n <= 1 && (t = null), r
        }
    }, v.once = v.partial(v.before, 2);
    var E = !{
            toString: null
        }.propertyIsEnumerable("toString"),
        M = ["valueOf", "isPrototypeOf", "toString", "propertyIsEnumerable", "hasOwnProperty", "toLocaleString"];

    function I(n, t) {
        var r = M.length,
            e = n.constructor,
            u = v.isFunction(e) && e.prototype || o,
            i = "constructor";
        for (v.has(n, i) && !v.contains(t, i) && t.push(i); r--;)(i = M[r]) in n && n[i] !== u[i] && !v.contains(t, i) && t.push(i)
    }
    v.keys = function(n) {
        if (!v.isObject(n)) return [];
        if (l) return l(n);
        var t = [];
        for (var r in n) v.has(n, r) && t.push(r);
        return E && I(n, t), t
    }, v.allKeys = function(n) {
        if (!v.isObject(n)) return [];
        var t = [];
        for (var r in n) t.push(r);
        return E && I(n, t), t
    }, v.values = function(n) {
        for (var t = v.keys(n), r = t.length, e = Array(r), u = 0; u < r; u++) e[u] = n[t[u]];
        return e
    }, v.mapObject = function(n, t, r) {
        t = d(t, r);
        for (var e, u = v.keys(n), i = u.length, o = {}, a = 0; a < i; a++) o[e = u[a]] = t(n[e], e, n);
        return o
    }, v.pairs = function(n) {
        for (var t = v.keys(n), r = t.length, e = Array(r), u = 0; u < r; u++) e[u] = [t[u], n[t[u]]];
        return e
    }, v.invert = function(n) {
        for (var t = {}, r = v.keys(n), e = 0, u = r.length; e < u; e++) t[n[r[e]]] = r[e];
        return t
    }, v.functions = v.methods = function(n) {
        var t = [];
        for (var r in n) v.isFunction(n[r]) && t.push(r);
        return t.sort()
    }, v.extend = g(v.allKeys), v.extendOwn = v.assign = g(v.keys), v.findKey = function(n, t, r) {
        t = d(t, r);
        for (var e, u = v.keys(n), i = 0, o = u.length; i < o; i++)
            if (t(n[e = u[i]], e, n)) return e
    }, v.pick = function(n, t, r) {
        var e, u, i = {},
            o = n;
        if (null == o) return i;
        v.isFunction(t) ? (u = v.allKeys(o), e = y(t, r)) : (u = O(arguments, !1, !1, 1), e = function(n, t, r) {
            return t in r
        }, o = Object(o));
        for (var a = 0, c = u.length; a < c; a++) {
            var f = u[a],
                l = o[f];
            e(l, f, o) && (i[f] = l)
        }
        return i
    }, v.omit = function(n, t, r) {
        if (v.isFunction(t)) t = v.negate(t);
        else {
            var e = v.map(O(arguments, !1, !1, 1), String);
            t = function(n, t) {
                return !v.contains(e, t)
            }
        }
        return v.pick(n, t, r)
    }, v.defaults = g(v.allKeys, !0), v.create = function(n, t) {
        var r = m(n);
        return t && v.extendOwn(r, t), r
    }, v.clone = function(n) {
        return v.isObject(n) ? v.isArray(n) ? n.slice() : v.extend({}, n) : n
    }, v.tap = function(n, t) {
        return t(n), n
    }, v.isMatch = function(n, t) {
        var r = v.keys(t),
            e = r.length;
        if (null == n) return !e;
        for (var u = Object(n), i = 0; i < e; i++) {
            var o = r[i];
            if (t[o] !== u[o] || !(o in u)) return !1
        }
        return !0
    };
    var N = function(n, t, r, e) {
        if (n === t) return 0 !== n || 1 / n == 1 / t;
        if (null == n || null == t) return n === t;
        n instanceof v && (n = n._wrapped), t instanceof v && (t = t._wrapped);
        var u = s.call(n);
        if (u !== s.call(t)) return !1;
        switch (u) {
            case "[object RegExp]":
            case "[object String]":
                return "" + n == "" + t;
            case "[object Number]":
                return +n != +n ? +t != +t : 0 == +n ? 1 / +n == 1 / t : +n == +t;
            case "[object Date]":
            case "[object Boolean]":
                return +n == +t
        }
        var i = "[object Array]" === u;
        if (!i) {
            if ("object" != typeof n || "object" != typeof t) return !1;
            var o = n.constructor,
                a = t.constructor;
            if (o !== a && !(v.isFunction(o) && o instanceof o && v.isFunction(a) && a instanceof a) && "constructor" in n && "constructor" in t) return !1
        }
        e = e || [];
        for (var c = (r = r || []).length; c--;)
            if (r[c] === n) return e[c] === t;
        if (r.push(n), e.push(t), i) {
            if ((c = n.length) !== t.length) return !1;
            for (; c--;)
                if (!N(n[c], t[c], r, e)) return !1
        } else {
            var f, l = v.keys(n);
            if (c = l.length, v.keys(t).length !== c) return !1;
            for (; c--;)
                if (f = l[c], !v.has(t, f) || !N(n[f], t[f], r, e)) return !1
        }
        return r.pop(), e.pop(), !0
    };
    v.isEqual = function(n, t) {
        return N(n, t)
    }, v.isEmpty = function(n) {
        return null == n || (j(n) && (v.isArray(n) || v.isString(n) || v.isArguments(n)) ? 0 === n.length : 0 === v.keys(n).length)
    }, v.isElement = function(n) {
        return !(!n || 1 !== n.nodeType)
    }, v.isArray = f || function(n) {
        return "[object Array]" === s.call(n)
    }, v.isObject = function(n) {
        var t = typeof n;
        return "function" == t || "object" == t && !!n
    }, v.each(["Arguments", "Function", "String", "Number", "Date", "RegExp", "Error"], function(t) {
        v["is" + t] = function(n) {
            return s.call(n) === "[object " + t + "]"
        }
    }), v.isArguments(arguments) || (v.isArguments = function(n) {
        return v.has(n, "callee")
    }), "function" != typeof /./ && "object" != typeof Int8Array && (v.isFunction = function(n) {
        return "function" == typeof n || !1
    }), v.isFinite = function(n) {
        return isFinite(n) && !isNaN(parseFloat(n))
    }, v.isNaN = function(n) {
        return v.isNumber(n) && n !== +n
    }, v.isBoolean = function(n) {
        return !0 === n || !1 === n || "[object Boolean]" === s.call(n)
    }, v.isNull = function(n) {
        return null === n
    }, v.isUndefined = function(n) {
        return void 0 === n
    }, v.has = function(n, t) {
        return null != n && a.call(n, t)
    }, v.noConflict = function() {
        return n._ = t, this
    }, v.identity = function(n) {
        return n
    }, v.constant = function(n) {
        return function() {
            return n
        }
    }, v.noop = function() {}, v.property = b, v.propertyOf = function(t) {
        return null == t ? function() {} : function(n) {
            return t[n]
        }
    }, v.matcher = v.matches = function(t) {
        return t = v.extendOwn({}, t),
            function(n) {
                return v.isMatch(n, t)
            }
    }, v.times = function(n, t, r) {
        var e = Array(Math.max(0, n));
        t = y(t, r, 1);
        for (var u = 0; u < n; u++) e[u] = t(u);
        return e
    }, v.random = function(n, t) {
        return null == t && (t = n, n = 0), n + Math.floor(Math.random() * (t - n + 1))
    }, v.now = Date.now || function() {
        return (new Date).getTime()
    };

    function B(t) {
        function r(n) {
            return t[n]
        }
        var n = "(?:" + v.keys(t).join("|") + ")",
            e = RegExp(n),
            u = RegExp(n, "g");
        return function(n) {
            return n = null == n ? "" : "" + n, e.test(n) ? n.replace(u, r) : n
        }
    }
    var T = {
            "&": "&amp;",
            "<": "&lt;",
            ">": "&gt;",
            '"': "&quot;",
            "'": "&#x27;",
            "`": "&#x60;"
        },
        R = v.invert(T);
    v.escape = B(T), v.unescape = B(R), v.result = function(n, t, r) {
        var e = null == n ? void 0 : n[t];
        return void 0 === e && (e = r), v.isFunction(e) ? e.call(n) : e
    };
    var q = 0;
    v.uniqueId = function(n) {
        var t = ++q + "";
        return n ? n + t : t
    }, v.templateSettings = {
        evaluate: /<%([\s\S]+?)%>/g,
        interpolate: /<%=([\s\S]+?)%>/g,
        escape: /<%-([\s\S]+?)%>/g
    };

    function K(n) {
        return "\\" + D[n]
    }
    var z = /(.)^/,
        D = {
            "'": "'",
            "\\": "\\",
            "\r": "r",
            "\n": "n",
            "\u2028": "u2028",
            "\u2029": "u2029"
        },
        L = /\\|'|\r|\n|\u2028|\u2029/g;
    v.template = function(i, n, t) {
        !n && t && (n = t), n = v.defaults({}, n, v.templateSettings);
        var r = RegExp([(n.escape || z).source, (n.interpolate || z).source, (n.evaluate || z).source].join("|") + "|$", "g"),
            o = 0,
            a = "__p+='";
        i.replace(r, function(n, t, r, e, u) {
            return a += i.slice(o, u).replace(L, K), o = u + n.length, t ? a += "'+\n((__t=(" + t + "))==null?'':_.escape(__t))+\n'" : r ? a += "'+\n((__t=(" + r + "))==null?'':__t)+\n'" : e && (a += "';\n" + e + "\n__p+='"), n
        }), a += "';\n", n.variable || (a = "with(obj||{}){\n" + a + "}\n"), a = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + a + "return __p;\n";
        try {
            var e = new Function(n.variable || "obj", "_", a)
        } catch (n) {
            throw n.source = a, n
        }

        function u(n) {
            return e.call(this, n, v)
        }
        var c = n.variable || "obj";
        return u.source = "function(" + c + "){\n" + a + "}", u
    }, v.chain = function(n) {
        var t = v(n);
        return t._chain = !0, t
    };

    function P(n, t) {
        return n._chain ? v(t).chain() : t
    }
    v.mixin = function(r) {
        v.each(v.functions(r), function(n) {
            var t = v[n] = r[n];
            v.prototype[n] = function() {
                var n = [this._wrapped];
                return i.apply(n, arguments), P(this, t.apply(v, n))
            }
        })
    }, v.mixin(v), v.each(["pop", "push", "reverse", "shift", "sort", "splice", "unshift"], function(t) {
        var r = e[t];
        v.prototype[t] = function() {
            var n = this._wrapped;
            return r.apply(n, arguments), "shift" !== t && "splice" !== t || 0 !== n.length || delete n[0], P(this, n)
        }
    }), v.each(["concat", "join", "slice"], function(n) {
        var t = e[n];
        v.prototype[n] = function() {
            return P(this, t.apply(this._wrapped, arguments))
        }
    }), v.prototype.value = function() {
        return this._wrapped
    }, v.prototype.valueOf = v.prototype.toJSON = v.prototype.value, v.prototype.toString = function() {
        return "" + this._wrapped
    }, "function" == typeof define && define.amd && define("underscore", [], function() {
        return v
    })
}).call(this);;
window.wp = window.wp || {}, wp.shortcode = {
    next: function(t, e, n) {
        var s, r, o = wp.shortcode.regexp(t);
        if (o.lastIndex = n || 0, s = o.exec(e)) return "[" === s[1] && "]" === s[7] ? wp.shortcode.next(t, e, o.lastIndex) : (r = {
            index: s.index,
            content: s[0],
            shortcode: wp.shortcode.fromMatch(s)
        }, s[1] && (r.content = r.content.slice(1), r.index++), s[7] && (r.content = r.content.slice(0, -1)), r)
    },
    replace: function(t, e, h) {
        return e.replace(wp.shortcode.regexp(t), function(t, e, n, s, r, o, i, c) {
            if ("[" === e && "]" === c) return t;
            var a = h(wp.shortcode.fromMatch(arguments));
            return a ? e + a + c : t
        })
    },
    string: function(t) {
        return new wp.shortcode(t).string()
    },
    regexp: _.memoize(function(t) {
        return new RegExp("\\[(\\[?)(" + t + ")(?![\\w-])([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*(?:\\[(?!\\/\\2\\])[^\\[]*)*)(\\[\\/\\2\\]))?)(\\]?)", "g")
    }),
    attrs: _.memoize(function(t) {
        var e, n, s = {},
            r = [];
        for (e = /([\w-]+)\s*=\s*"([^"]*)"(?:\s|$)|([\w-]+)\s*=\s*'([^']*)'(?:\s|$)|([\w-]+)\s*=\s*([^\s'"]+)(?:\s|$)|"([^"]*)"(?:\s|$)|'([^']*)'(?:\s|$)|(\S+)(?:\s|$)/g, t = t.replace(/[\u00a0\u200b]/g, " "); n = e.exec(t);) n[1] ? s[n[1].toLowerCase()] = n[2] : n[3] ? s[n[3].toLowerCase()] = n[4] : n[5] ? s[n[5].toLowerCase()] = n[6] : n[7] ? r.push(n[7]) : n[8] ? r.push(n[8]) : n[9] && r.push(n[9]);
        return {
            named: s,
            numeric: r
        }
    }),
    fromMatch: function(t) {
        var e;
        return e = t[4] ? "self-closing" : t[6] ? "closed" : "single", new wp.shortcode({
            tag: t[2],
            attrs: t[3],
            type: e,
            content: t[5]
        })
    }
}, wp.shortcode = _.extend(function(t) {
    _.extend(this, _.pick(t || {}, "tag", "attrs", "type", "content"));
    var e = this.attrs;
    this.attrs = {
        named: {},
        numeric: []
    }, e && (_.isString(e) ? this.attrs = wp.shortcode.attrs(e) : _.isEqual(_.keys(e), ["named", "numeric"]) ? this.attrs = e : _.each(t.attrs, function(t, e) {
        this.set(e, t)
    }, this))
}, wp.shortcode), _.extend(wp.shortcode.prototype, {
    get: function(t) {
        return this.attrs[_.isNumber(t) ? "numeric" : "named"][t]
    },
    set: function(t, e) {
        return this.attrs[_.isNumber(t) ? "numeric" : "named"][t] = e, this
    },
    string: function() {
        var n = "[" + this.tag;
        return _.each(this.attrs.numeric, function(t) {
            /\s/.test(t) ? n += ' "' + t + '"' : n += " " + t
        }), _.each(this.attrs.named, function(t, e) {
            n += " " + e + '="' + t + '"'
        }), "single" === this.type ? n + "]" : "self-closing" === this.type ? n + " /]" : (n += "]", this.content && (n += this.content), n + "[/" + this.tag + "]")
    }
}), wp.html = _.extend(wp.html || {}, {
    attrs: function(t) {
        var e, n;
        return "/" === t[t.length - 1] && (t = t.slice(0, -1)), e = wp.shortcode.attrs(t), n = e.named, _.each(e.numeric, function(t) {
            /\s/.test(t) || (n[t] = "")
        }), n
    },
    string: function(t) {
        var n = "<" + t.tag,
            e = t.content || "";
        return _.each(t.attrs, function(t, e) {
            n += " " + e, _.isBoolean(t) && (t = t ? "true" : "false"), n += '="' + t + '"'
        }), t.single ? n + " />" : (n += ">", (n += _.isObject(e) ? wp.html.string(e) : e) + "</" + t.tag + ">")
    }
});;
window.wpCookies = {
    each: function(e, t, n) {
        var i, s;
        if (!e) return 0;
        if (n = n || e, void 0 !== e.length) {
            for (i = 0, s = e.length; i < s; i++)
                if (!1 === t.call(n, e[i], i, e)) return 0
        } else
            for (i in e)
                if (e.hasOwnProperty(i) && !1 === t.call(n, e[i], i, e)) return 0; return 1
    },
    getHash: function(e) {
        var t, n = this.get(e);
        return n && this.each(n.split("&"), function(e) {
            e = e.split("="), (t = t || {})[e[0]] = e[1]
        }), t
    },
    setHash: function(e, t, n, i, s, r) {
        var o = "";
        this.each(t, function(e, t) {
            o += (o ? "&" : "") + t + "=" + e
        }), this.set(e, o, n, i, s, r)
    },
    get: function(e) {
        var t, n, i = document.cookie,
            s = e + "=";
        if (i) {
            if (-1 === (n = i.indexOf("; " + s))) {
                if (0 !== (n = i.indexOf(s))) return null
            } else n += 2;
            return -1 === (t = i.indexOf(";", n)) && (t = i.length), decodeURIComponent(i.substring(n + s.length, t))
        }
    },
    set: function(e, t, n, i, s, r) {
        var o = new Date;
        n = "object" == typeof n && n.toGMTString ? n.toGMTString() : parseInt(n, 10) ? (o.setTime(o.getTime() + 1e3 * parseInt(n, 10)), o.toGMTString()) : "", document.cookie = e + "=" + encodeURIComponent(t) + (n ? "; expires=" + n : "") + (i ? "; path=" + i : "") + (s ? "; domain=" + s : "") + (r ? "; secure" : "")
    },
    remove: function(e, t, n, i) {
        this.set(e, "", -1e3, t, n, i)
    }
}, window.getUserSetting = function(e, t) {
    var n = getAllUserSettings();
    return n.hasOwnProperty(e) ? n[e] : void 0 !== t ? t : ""
}, window.setUserSetting = function(e, t, n) {
    if ("object" != typeof userSettings) return !1;
    var i = userSettings.uid,
        s = wpCookies.getHash("wp-settings-" + i),
        r = userSettings.url,
        o = !!userSettings.secure;
    return e = e.toString().replace(/[^A-Za-z0-9_-]/g, ""), t = "number" == typeof t ? parseInt(t, 10) : t.toString().replace(/[^A-Za-z0-9_-]/g, ""), s = s || {}, n ? delete s[e] : s[e] = t, wpCookies.setHash("wp-settings-" + i, s, 31536e3, r, "", o), wpCookies.set("wp-settings-time-" + i, userSettings.time, 31536e3, r, "", o), e
}, window.deleteUserSetting = function(e) {
    return setUserSetting(e, "", 1)
}, window.getAllUserSettings = function() {
    return "object" != typeof userSettings ? {} : wpCookies.getHash("wp-settings-" + userSettings.uid) || {}
};;
! function(n) {
    var s = "object" == typeof self && self.self === self && self || "object" == typeof global && global.global === global && global;
    if ("function" == typeof define && define.amd) define(["underscore", "jquery", "exports"], function(t, e, i) {
        s.Backbone = n(s, i, t, e)
    });
    else if ("undefined" != typeof exports) {
        var t, e = require("underscore");
        try {
            t = require("jquery")
        } catch (t) {}
        n(s, exports, e, t)
    } else s.Backbone = n(s, {}, s._, s.jQuery || s.Zepto || s.ender || s.$)
}(function(t, h, x, e) {
    var i = t.Backbone,
        o = Array.prototype.slice;
    h.VERSION = "1.4.0", h.$ = e, h.noConflict = function() {
        return t.Backbone = i, this
    }, h.emulateHTTP = !1, h.emulateJSON = !1;
    var a, n = h.Events = {},
        u = /\s+/,
        l = function(t, e, i, n, s) {
            var r, o = 0;
            if (i && "object" == typeof i) {
                void 0 !== n && "context" in s && void 0 === s.context && (s.context = n);
                for (r = x.keys(i); o < r.length; o++) e = l(t, e, r[o], i[r[o]], s)
            } else if (i && u.test(i))
                for (r = i.split(u); o < r.length; o++) e = t(e, r[o], n, s);
            else e = t(e, i, n, s);
            return e
        };
    n.on = function(t, e, i) {
        this._events = l(s, this._events || {}, t, e, {
            context: i,
            ctx: this,
            listening: a
        }), a && (((this._listeners || (this._listeners = {}))[a.id] = a).interop = !1);
        return this
    }, n.listenTo = function(t, e, i) {
        if (!t) return this;
        var n = t._listenId || (t._listenId = x.uniqueId("l")),
            s = this._listeningTo || (this._listeningTo = {}),
            r = a = s[n];
        r || (this._listenId || (this._listenId = x.uniqueId("l")), r = a = s[n] = new g(this, t));
        var o = c(t, e, i, this);
        if (a = void 0, o) throw o;
        return r.interop && r.on(e, i), this
    };
    var s = function(t, e, i, n) {
            if (i) {
                var s = t[e] || (t[e] = []),
                    r = n.context,
                    o = n.ctx,
                    a = n.listening;
                a && a.count++, s.push({
                    callback: i,
                    context: r,
                    ctx: r || o,
                    listening: a
                })
            }
            return t
        },
        c = function(t, e, i, n) {
            try {
                t.on(e, i, n)
            } catch (t) {
                return t
            }
        };
    n.off = function(t, e, i) {
        return this._events && (this._events = l(r, this._events, t, e, {
            context: i,
            listeners: this._listeners
        })), this
    }, n.stopListening = function(t, e, i) {
        var n = this._listeningTo;
        if (!n) return this;
        for (var s = t ? [t._listenId] : x.keys(n), r = 0; r < s.length; r++) {
            var o = n[s[r]];
            if (!o) break;
            o.obj.off(e, i, this), o.interop && o.off(e, i)
        }
        return x.isEmpty(n) && (this._listeningTo = void 0), this
    };
    var r = function(t, e, i, n) {
        if (t) {
            var s, r = n.context,
                o = n.listeners,
                a = 0;
            if (e || r || i) {
                for (s = e ? [e] : x.keys(t); a < s.length; a++) {
                    var h = t[e = s[a]];
                    if (!h) break;
                    for (var u = [], l = 0; l < h.length; l++) {
                        var c = h[l];
                        if (i && i !== c.callback && i !== c.callback._callback || r && r !== c.context) u.push(c);
                        else {
                            var d = c.listening;
                            d && d.off(e, i)
                        }
                    }
                    u.length ? t[e] = u : delete t[e]
                }
                return t
            }
            for (s = x.keys(o); a < s.length; a++) o[s[a]].cleanup()
        }
    };
    n.once = function(t, e, i) {
        var n = l(d, {}, t, e, this.off.bind(this));
        return "string" == typeof t && null == i && (e = void 0), this.on(n, e, i)
    }, n.listenToOnce = function(t, e, i) {
        var n = l(d, {}, e, i, this.stopListening.bind(this, t));
        return this.listenTo(t, n)
    };
    var d = function(t, e, i, n) {
        if (i) {
            var s = t[e] = x.once(function() {
                n(e, s), i.apply(this, arguments)
            });
            s._callback = i
        }
        return t
    };
    n.trigger = function(t) {
        if (!this._events) return this;
        for (var e = Math.max(0, arguments.length - 1), i = Array(e), n = 0; n < e; n++) i[n] = arguments[n + 1];
        return l(f, this._events, t, void 0, i), this
    };
    var f = function(t, e, i, n) {
            if (t) {
                var s = t[e],
                    r = t.all;
                s && r && (r = r.slice()), s && p(s, n), r && p(r, [e].concat(n))
            }
            return t
        },
        p = function(t, e) {
            var i, n = -1,
                s = t.length,
                r = e[0],
                o = e[1],
                a = e[2];
            switch (e.length) {
                case 0:
                    for (; ++n < s;)(i = t[n]).callback.call(i.ctx);
                    return;
                case 1:
                    for (; ++n < s;)(i = t[n]).callback.call(i.ctx, r);
                    return;
                case 2:
                    for (; ++n < s;)(i = t[n]).callback.call(i.ctx, r, o);
                    return;
                case 3:
                    for (; ++n < s;)(i = t[n]).callback.call(i.ctx, r, o, a);
                    return;
                default:
                    for (; ++n < s;)(i = t[n]).callback.apply(i.ctx, e);
                    return
            }
        },
        g = function(t, e) {
            this.id = t._listenId, this.listener = t, this.obj = e, this.interop = !0, this.count = 0, this._events = void 0
        };
    g.prototype.on = n.on, g.prototype.off = function(t, e) {
        (this.interop ? (this._events = l(r, this._events, t, e, {
            context: void 0,
            listeners: void 0
        }), this._events) : (this.count--, 0 !== this.count)) || this.cleanup()
    }, g.prototype.cleanup = function() {
        delete this.listener._listeningTo[this.obj._listenId], this.interop || delete this.obj._listeners[this.id]
    }, n.bind = n.on, n.unbind = n.off, x.extend(h, n);
    var v = h.Model = function(t, e) {
        var i = t || {};
        e = e || {}, this.preinitialize.apply(this, arguments), this.cid = x.uniqueId(this.cidPrefix), this.attributes = {}, e.collection && (this.collection = e.collection), e.parse && (i = this.parse(i, e) || {});
        var n = x.result(this, "defaults");
        i = x.defaults(x.extend({}, n, i), n), this.set(i, e), this.changed = {}, this.initialize.apply(this, arguments)
    };
    x.extend(v.prototype, n, {
        changed: null,
        validationError: null,
        idAttribute: "id",
        cidPrefix: "c",
        preinitialize: function() {},
        initialize: function() {},
        toJSON: function(t) {
            return x.clone(this.attributes)
        },
        sync: function() {
            return h.sync.apply(this, arguments)
        },
        get: function(t) {
            return this.attributes[t]
        },
        escape: function(t) {
            return x.escape(this.get(t))
        },
        has: function(t) {
            return null != this.get(t)
        },
        matches: function(t) {
            return !!x.iteratee(t, this)(this.attributes)
        },
        set: function(t, e, i) {
            if (null == t) return this;
            var n;
            if ("object" == typeof t ? (n = t, i = e) : (n = {})[t] = e, i = i || {}, !this._validate(n, i)) return !1;
            var s = i.unset,
                r = i.silent,
                o = [],
                a = this._changing;
            this._changing = !0, a || (this._previousAttributes = x.clone(this.attributes), this.changed = {});
            var h = this.attributes,
                u = this.changed,
                l = this._previousAttributes;
            for (var c in n) e = n[c], x.isEqual(h[c], e) || o.push(c), x.isEqual(l[c], e) ? delete u[c] : u[c] = e, s ? delete h[c] : h[c] = e;
            if (this.idAttribute in n && (this.id = this.get(this.idAttribute)), !r) {
                o.length && (this._pending = i);
                for (var d = 0; d < o.length; d++) this.trigger("change:" + o[d], this, h[o[d]], i)
            }
            if (a) return this;
            if (!r)
                for (; this._pending;) i = this._pending, this._pending = !1, this.trigger("change", this, i);
            return this._pending = !1, this._changing = !1, this
        },
        unset: function(t, e) {
            return this.set(t, void 0, x.extend({}, e, {
                unset: !0
            }))
        },
        clear: function(t) {
            var e = {};
            for (var i in this.attributes) e[i] = void 0;
            return this.set(e, x.extend({}, t, {
                unset: !0
            }))
        },
        hasChanged: function(t) {
            return null == t ? !x.isEmpty(this.changed) : x.has(this.changed, t)
        },
        changedAttributes: function(t) {
            if (!t) return !!this.hasChanged() && x.clone(this.changed);
            var e, i = this._changing ? this._previousAttributes : this.attributes,
                n = {};
            for (var s in t) {
                var r = t[s];
                x.isEqual(i[s], r) || (n[s] = r, e = !0)
            }
            return !!e && n
        },
        previous: function(t) {
            return null != t && this._previousAttributes ? this._previousAttributes[t] : null
        },
        previousAttributes: function() {
            return x.clone(this._previousAttributes)
        },
        fetch: function(i) {
            i = x.extend({
                parse: !0
            }, i);
            var n = this,
                s = i.success;
            return i.success = function(t) {
                var e = i.parse ? n.parse(t, i) : t;
                if (!n.set(e, i)) return !1;
                s && s.call(i.context, n, t, i), n.trigger("sync", n, t, i)
            }, L(this, i), this.sync("read", this, i)
        },
        save: function(t, e, i) {
            var n;
            null == t || "object" == typeof t ? (n = t, i = e) : (n = {})[t] = e;
            var s = (i = x.extend({
                validate: !0,
                parse: !0
            }, i)).wait;
            if (n && !s) {
                if (!this.set(n, i)) return !1
            } else if (!this._validate(n, i)) return !1;
            var r = this,
                o = i.success,
                a = this.attributes;
            i.success = function(t) {
                r.attributes = a;
                var e = i.parse ? r.parse(t, i) : t;
                if (s && (e = x.extend({}, n, e)), e && !r.set(e, i)) return !1;
                o && o.call(i.context, r, t, i), r.trigger("sync", r, t, i)
            }, L(this, i), n && s && (this.attributes = x.extend({}, a, n));
            var h = this.isNew() ? "create" : i.patch ? "patch" : "update";
            "patch" != h || i.attrs || (i.attrs = n);
            var u = this.sync(h, this, i);
            return this.attributes = a, u
        },
        destroy: function(e) {
            e = e ? x.clone(e) : {};

            function i() {
                n.stopListening(), n.trigger("destroy", n, n.collection, e)
            }
            var n = this,
                s = e.success,
                r = e.wait,
                t = !(e.success = function(t) {
                    r && i(), s && s.call(e.context, n, t, e), n.isNew() || n.trigger("sync", n, t, e)
                });
            return this.isNew() ? x.defer(e.success) : (L(this, e), t = this.sync("delete", this, e)), r || i(), t
        },
        url: function() {
            var t = x.result(this, "urlRoot") || x.result(this.collection, "url") || J();
            if (this.isNew()) return t;
            var e = this.get(this.idAttribute);
            return t.replace(/[^\/]$/, "$&/") + encodeURIComponent(e)
        },
        parse: function(t, e) {
            return t
        },
        clone: function() {
            return new this.constructor(this.attributes)
        },
        isNew: function() {
            return !this.has(this.idAttribute)
        },
        isValid: function(t) {
            return this._validate({}, x.extend({}, t, {
                validate: !0
            }))
        },
        _validate: function(t, e) {
            if (!e.validate || !this.validate) return !0;
            t = x.extend({}, this.attributes, t);
            var i = this.validationError = this.validate(t, e) || null;
            return !i || (this.trigger("invalid", this, i, x.extend(e, {
                validationError: i
            })), !1)
        }
    });

    function w(t, e, i) {
        i = Math.min(Math.max(i, 0), t.length);
        var n, s = Array(t.length - i),
            r = e.length;
        for (n = 0; n < s.length; n++) s[n] = t[n + i];
        for (n = 0; n < r; n++) t[n + i] = e[n];
        for (n = 0; n < s.length; n++) t[n + r + i] = s[n]
    }
    var m = h.Collection = function(t, e) {
            e = e || {}, this.preinitialize.apply(this, arguments), e.model && (this.model = e.model), void 0 !== e.comparator && (this.comparator = e.comparator), this._reset(), this.initialize.apply(this, arguments), t && this.reset(t, x.extend({
                silent: !0
            }, e))
        },
        E = {
            add: !0,
            remove: !0,
            merge: !0
        },
        _ = {
            add: !0,
            remove: !1
        };
    x.extend(m.prototype, n, {
        model: v,
        preinitialize: function() {},
        initialize: function() {},
        toJSON: function(e) {
            return this.map(function(t) {
                return t.toJSON(e)
            })
        },
        sync: function() {
            return h.sync.apply(this, arguments)
        },
        add: function(t, e) {
            return this.set(t, x.extend({
                merge: !1
            }, e, _))
        },
        remove: function(t, e) {
            e = x.extend({}, e);
            var i = !x.isArray(t);
            t = i ? [t] : t.slice();
            var n = this._removeModels(t, e);
            return !e.silent && n.length && (e.changes = {
                added: [],
                merged: [],
                removed: n
            }, this.trigger("update", this, e)), i ? n[0] : n
        },
        set: function(t, e) {
            if (null != t) {
                (e = x.extend({}, E, e)).parse && !this._isModel(t) && (t = this.parse(t, e) || []);
                var i = !x.isArray(t);
                t = i ? [t] : t.slice();
                var n = e.at;
                null != n && (n = +n), n > this.length && (n = this.length), n < 0 && (n += this.length + 1);
                var s, r, o = [],
                    a = [],
                    h = [],
                    u = [],
                    l = {},
                    c = e.add,
                    d = e.merge,
                    f = e.remove,
                    p = !1,
                    g = this.comparator && null == n && !1 !== e.sort,
                    v = x.isString(this.comparator) ? this.comparator : null;
                for (r = 0; r < t.length; r++) {
                    s = t[r];
                    var m = this.get(s);
                    if (m) {
                        if (d && s !== m) {
                            var _ = this._isModel(s) ? s.attributes : s;
                            e.parse && (_ = m.parse(_, e)), m.set(_, e), h.push(m), g && !p && (p = m.hasChanged(v))
                        }
                        l[m.cid] || (l[m.cid] = !0, o.push(m)), t[r] = m
                    } else c && (s = t[r] = this._prepareModel(s, e)) && (a.push(s), this._addReference(s, e), l[s.cid] = !0, o.push(s))
                }
                if (f) {
                    for (r = 0; r < this.length; r++) l[(s = this.models[r]).cid] || u.push(s);
                    u.length && this._removeModels(u, e)
                }
                var y = !1,
                    b = !g && c && f;
                if (o.length && b ? (y = this.length !== o.length || x.some(this.models, function(t, e) {
                        return t !== o[e]
                    }), this.models.length = 0, w(this.models, o, 0), this.length = this.models.length) : a.length && (g && (p = !0), w(this.models, a, null == n ? this.length : n), this.length = this.models.length), p && this.sort({
                        silent: !0
                    }), !e.silent) {
                    for (r = 0; r < a.length; r++) null != n && (e.index = n + r), (s = a[r]).trigger("add", s, this, e);
                    (p || y) && this.trigger("sort", this, e), (a.length || u.length || h.length) && (e.changes = {
                        added: a,
                        removed: u,
                        merged: h
                    }, this.trigger("update", this, e))
                }
                return i ? t[0] : t
            }
        },
        reset: function(t, e) {
            e = e ? x.clone(e) : {};
            for (var i = 0; i < this.models.length; i++) this._removeReference(this.models[i], e);
            return e.previousModels = this.models, this._reset(), t = this.add(t, x.extend({
                silent: !0
            }, e)), e.silent || this.trigger("reset", this, e), t
        },
        push: function(t, e) {
            return this.add(t, x.extend({
                at: this.length
            }, e))
        },
        pop: function(t) {
            var e = this.at(this.length - 1);
            return this.remove(e, t)
        },
        unshift: function(t, e) {
            return this.add(t, x.extend({
                at: 0
            }, e))
        },
        shift: function(t) {
            var e = this.at(0);
            return this.remove(e, t)
        },
        slice: function() {
            return o.apply(this.models, arguments)
        },
        get: function(t) {
            if (null != t) return this._byId[t] || this._byId[this.modelId(this._isModel(t) ? t.attributes : t)] || t.cid && this._byId[t.cid]
        },
        has: function(t) {
            return null != this.get(t)
        },
        at: function(t) {
            return t < 0 && (t += this.length), this.models[t]
        },
        where: function(t, e) {
            return this[e ? "find" : "filter"](t)
        },
        findWhere: function(t) {
            return this.where(t, !0)
        },
        sort: function(t) {
            var e = this.comparator;
            if (!e) throw new Error("Cannot sort a set without a comparator");
            t = t || {};
            var i = e.length;
            return x.isFunction(e) && (e = e.bind(this)), 1 === i || x.isString(e) ? this.models = this.sortBy(e) : this.models.sort(e), t.silent || this.trigger("sort", this, t), this
        },
        pluck: function(t) {
            return this.map(t + "")
        },
        fetch: function(i) {
            var n = (i = x.extend({
                    parse: !0
                }, i)).success,
                s = this;
            return i.success = function(t) {
                var e = i.reset ? "reset" : "set";
                s[e](t, i), n && n.call(i.context, s, t, i), s.trigger("sync", s, t, i)
            }, L(this, i), this.sync("read", this, i)
        },
        create: function(t, e) {
            var n = (e = e ? x.clone(e) : {}).wait;
            if (!(t = this._prepareModel(t, e))) return !1;
            n || this.add(t, e);
            var s = this,
                r = e.success;
            return e.success = function(t, e, i) {
                n && s.add(t, i), r && r.call(i.context, t, e, i)
            }, t.save(null, e), t
        },
        parse: function(t, e) {
            return t
        },
        clone: function() {
            return new this.constructor(this.models, {
                model: this.model,
                comparator: this.comparator
            })
        },
        modelId: function(t) {
            return t[this.model.prototype.idAttribute || "id"]
        },
        values: function() {
            return new b(this, k)
        },
        keys: function() {
            return new b(this, I)
        },
        entries: function() {
            return new b(this, S)
        },
        _reset: function() {
            this.length = 0, this.models = [], this._byId = {}
        },
        _prepareModel: function(t, e) {
            if (this._isModel(t)) return t.collection || (t.collection = this), t;
            var i = new(((e = e ? x.clone(e) : {}).collection = this).model)(t, e);
            return i.validationError ? (this.trigger("invalid", this, i.validationError, e), !1) : i
        },
        _removeModels: function(t, e) {
            for (var i = [], n = 0; n < t.length; n++) {
                var s = this.get(t[n]);
                if (s) {
                    var r = this.indexOf(s);
                    this.models.splice(r, 1), this.length--, delete this._byId[s.cid];
                    var o = this.modelId(s.attributes);
                    null != o && delete this._byId[o], e.silent || (e.index = r, s.trigger("remove", s, this, e)), i.push(s), this._removeReference(s, e)
                }
            }
            return i
        },
        _isModel: function(t) {
            return t instanceof v
        },
        _addReference: function(t, e) {
            this._byId[t.cid] = t;
            var i = this.modelId(t.attributes);
            null != i && (this._byId[i] = t), t.on("all", this._onModelEvent, this)
        },
        _removeReference: function(t, e) {
            delete this._byId[t.cid];
            var i = this.modelId(t.attributes);
            null != i && delete this._byId[i], this === t.collection && delete t.collection, t.off("all", this._onModelEvent, this)
        },
        _onModelEvent: function(t, e, i, n) {
            if (e) {
                if (("add" === t || "remove" === t) && i !== this) return;
                if ("destroy" === t && this.remove(e, n), "change" === t) {
                    var s = this.modelId(e.previousAttributes()),
                        r = this.modelId(e.attributes);
                    s !== r && (null != s && delete this._byId[s], null != r && (this._byId[r] = e))
                }
            }
            this.trigger.apply(this, arguments)
        }
    });
    var y = "function" == typeof Symbol && Symbol.iterator;
    y && (m.prototype[y] = m.prototype.values);
    var b = function(t, e) {
            this._collection = t, this._kind = e, this._index = 0
        },
        k = 1,
        I = 2,
        S = 3;
    y && (b.prototype[y] = function() {
        return this
    }), b.prototype.next = function() {
        if (this._collection) {
            if (this._index < this._collection.length) {
                var t, e = this._collection.at(this._index);
                if (this._index++, this._kind === k) t = e;
                else {
                    var i = this._collection.modelId(e.attributes);
                    t = this._kind === I ? i : [i, e]
                }
                return {
                    value: t,
                    done: !1
                }
            }
            this._collection = void 0
        }
        return {
            value: void 0,
            done: !0
        }
    };
    var T = h.View = function(t) {
            this.cid = x.uniqueId("view"), this.preinitialize.apply(this, arguments), x.extend(this, x.pick(t, H)), this._ensureElement(), this.initialize.apply(this, arguments)
        },
        P = /^(\S+)\s*(.*)$/,
        H = ["model", "collection", "el", "id", "attributes", "className", "tagName", "events"];
    x.extend(T.prototype, n, {
        tagName: "div",
        $: function(t) {
            return this.$el.find(t)
        },
        preinitialize: function() {},
        initialize: function() {},
        render: function() {
            return this
        },
        remove: function() {
            return this._removeElement(), this.stopListening(), this
        },
        _removeElement: function() {
            this.$el.remove()
        },
        setElement: function(t) {
            return this.undelegateEvents(), this._setElement(t), this.delegateEvents(), this
        },
        _setElement: function(t) {
            this.$el = t instanceof h.$ ? t : h.$(t), this.el = this.$el[0]
        },
        delegateEvents: function(t) {
            if (!(t = t || x.result(this, "events"))) return this;
            for (var e in this.undelegateEvents(), t) {
                var i = t[e];
                if (x.isFunction(i) || (i = this[i]), i) {
                    var n = e.match(P);
                    this.delegate(n[1], n[2], i.bind(this))
                }
            }
            return this
        },
        delegate: function(t, e, i) {
            return this.$el.on(t + ".delegateEvents" + this.cid, e, i), this
        },
        undelegateEvents: function() {
            return this.$el && this.$el.off(".delegateEvents" + this.cid), this
        },
        undelegate: function(t, e, i) {
            return this.$el.off(t + ".delegateEvents" + this.cid, e, i), this
        },
        _createElement: function(t) {
            return document.createElement(t)
        },
        _ensureElement: function() {
            if (this.el) this.setElement(x.result(this, "el"));
            else {
                var t = x.extend({}, x.result(this, "attributes"));
                this.id && (t.id = x.result(this, "id")), this.className && (t.class = x.result(this, "className")), this.setElement(this._createElement(x.result(this, "tagName"))), this._setAttributes(t)
            }
        },
        _setAttributes: function(t) {
            this.$el.attr(t)
        }
    });

    function $(i, n, t, s) {
        x.each(t, function(t, e) {
            n[e] && (i.prototype[e] = function(n, t, s, r) {
                switch (t) {
                    case 1:
                        return function() {
                            return n[s](this[r])
                        };
                    case 2:
                        return function(t) {
                            return n[s](this[r], t)
                        };
                    case 3:
                        return function(t, e) {
                            return n[s](this[r], A(t, this), e)
                        };
                    case 4:
                        return function(t, e, i) {
                            return n[s](this[r], A(t, this), e, i)
                        };
                    default:
                        return function() {
                            var t = o.call(arguments);
                            return t.unshift(this[r]), n[s].apply(n, t)
                        }
                }
            }(n, t, e, s))
        })
    }
    var A = function(e, t) {
            return x.isFunction(e) ? e : x.isObject(e) && !t._isModel(e) ? C(e) : x.isString(e) ? function(t) {
                return t.get(e)
            } : e
        },
        C = function(t) {
            var e = x.matches(t);
            return function(t) {
                return e(t.attributes)
            }
        };
    x.each([
        [m, {
            forEach: 3,
            each: 3,
            map: 3,
            collect: 3,
            reduce: 0,
            foldl: 0,
            inject: 0,
            reduceRight: 0,
            foldr: 0,
            find: 3,
            detect: 3,
            filter: 3,
            select: 3,
            reject: 3,
            every: 3,
            all: 3,
            some: 3,
            any: 3,
            include: 3,
            includes: 3,
            contains: 3,
            invoke: 0,
            max: 3,
            min: 3,
            toArray: 1,
            size: 1,
            first: 3,
            head: 3,
            take: 3,
            initial: 3,
            rest: 3,
            tail: 3,
            drop: 3,
            last: 3,
            without: 0,
            difference: 0,
            indexOf: 3,
            shuffle: 1,
            lastIndexOf: 3,
            isEmpty: 1,
            chain: 1,
            sample: 3,
            partition: 3,
            groupBy: 3,
            countBy: 3,
            sortBy: 3,
            indexBy: 3,
            findIndex: 3,
            findLastIndex: 3
        }, "models"],
        [v, {
            keys: 1,
            values: 1,
            pairs: 1,
            invert: 1,
            pick: 0,
            omit: 0,
            chain: 1,
            isEmpty: 1
        }, "attributes"]
    ], function(t) {
        var i = t[0],
            e = t[1],
            n = t[2];
        i.mixin = function(t) {
            var e = x.reduce(x.functions(t), function(t, e) {
                return t[e] = 0, t
            }, {});
            $(i, t, e, n)
        }, $(i, x, e, n)
    }), h.sync = function(t, e, n) {
        var i = R[t];
        x.defaults(n = n || {}, {
            emulateHTTP: h.emulateHTTP,
            emulateJSON: h.emulateJSON
        });
        var s = {
            type: i,
            dataType: "json"
        };
        if (n.url || (s.url = x.result(e, "url") || J()), null != n.data || !e || "create" !== t && "update" !== t && "patch" !== t || (s.contentType = "application/json", s.data = JSON.stringify(n.attrs || e.toJSON(n))), n.emulateJSON && (s.contentType = "application/x-www-form-urlencoded", s.data = s.data ? {
                model: s.data
            } : {}), n.emulateHTTP && ("PUT" === i || "DELETE" === i || "PATCH" === i)) {
            s.type = "POST", n.emulateJSON && (s.data._method = i);
            var r = n.beforeSend;
            n.beforeSend = function(t) {
                if (t.setRequestHeader("X-HTTP-Method-Override", i), r) return r.apply(this, arguments)
            }
        }
        "GET" === s.type || n.emulateJSON || (s.processData = !1);
        var o = n.error;
        n.error = function(t, e, i) {
            n.textStatus = e, n.errorThrown = i, o && o.call(n.context, t, e, i)
        };
        var a = n.xhr = h.ajax(x.extend(s, n));
        return e.trigger("request", e, a, n), a
    };
    var R = {
        create: "POST",
        update: "PUT",
        patch: "PATCH",
        delete: "DELETE",
        read: "GET"
    };
    h.ajax = function() {
        return h.$.ajax.apply(h.$, arguments)
    };
    var M = h.Router = function(t) {
            t = t || {}, this.preinitialize.apply(this, arguments), t.routes && (this.routes = t.routes), this._bindRoutes(), this.initialize.apply(this, arguments)
        },
        N = /\((.*?)\)/g,
        j = /(\(\?)?:\w+/g,
        O = /\*\w+/g,
        U = /[\-{}\[\]+?.,\\\^$|#\s]/g;
    x.extend(M.prototype, n, {
        preinitialize: function() {},
        initialize: function() {},
        route: function(i, n, s) {
            x.isRegExp(i) || (i = this._routeToRegExp(i)), x.isFunction(n) && (s = n, n = ""), s = s || this[n];
            var r = this;
            return h.history.route(i, function(t) {
                var e = r._extractParameters(i, t);
                !1 !== r.execute(s, e, n) && (r.trigger.apply(r, ["route:" + n].concat(e)), r.trigger("route", n, e), h.history.trigger("route", r, n, e))
            }), this
        },
        execute: function(t, e, i) {
            t && t.apply(this, e)
        },
        navigate: function(t, e) {
            return h.history.navigate(t, e), this
        },
        _bindRoutes: function() {
            if (this.routes) {
                this.routes = x.result(this, "routes");
                for (var t, e = x.keys(this.routes); null != (t = e.pop());) this.route(t, this.routes[t])
            }
        },
        _routeToRegExp: function(t) {
            return t = t.replace(U, "\\$&").replace(N, "(?:$1)?").replace(j, function(t, e) {
                return e ? t : "([^/?]+)"
            }).replace(O, "([^?]*?)"), new RegExp("^" + t + "(?:\\?([\\s\\S]*))?$")
        },
        _extractParameters: function(t, e) {
            var i = t.exec(e).slice(1);
            return x.map(i, function(t, e) {
                return e === i.length - 1 ? t || null : t ? decodeURIComponent(t) : null
            })
        }
    });
    var z = h.History = function() {
            this.handlers = [], this.checkUrl = this.checkUrl.bind(this), "undefined" != typeof window && (this.location = window.location, this.history = window.history)
        },
        q = /^[#\/]|\s+$/g,
        F = /^\/+|\/+$/g,
        B = /#.*$/;
    z.started = !1, x.extend(z.prototype, n, {
        interval: 50,
        atRoot: function() {
            return this.location.pathname.replace(/[^\/]$/, "$&/") === this.root && !this.getSearch()
        },
        matchRoot: function() {
            return this.decodeFragment(this.location.pathname).slice(0, this.root.length - 1) + "/" === this.root
        },
        decodeFragment: function(t) {
            return decodeURI(t.replace(/%25/g, "%2525"))
        },
        getSearch: function() {
            var t = this.location.href.replace(/#.*/, "").match(/\?.+/);
            return t ? t[0] : ""
        },
        getHash: function(t) {
            var e = (t || this).location.href.match(/#(.*)$/);
            return e ? e[1] : ""
        },
        getPath: function() {
            var t = this.decodeFragment(this.location.pathname + this.getSearch()).slice(this.root.length - 1);
            return "/" === t.charAt(0) ? t.slice(1) : t
        },
        getFragment: function(t) {
            return null == t && (t = this._usePushState || !this._wantsHashChange ? this.getPath() : this.getHash()), t.replace(q, "")
        },
        start: function(t) {
            if (z.started) throw new Error("Backbone.history has already been started");
            if (z.started = !0, this.options = x.extend({
                    root: "/"
                }, this.options, t), this.root = this.options.root, this._wantsHashChange = !1 !== this.options.hashChange, this._hasHashChange = "onhashchange" in window && (void 0 === document.documentMode || 7 < document.documentMode), this._useHashChange = this._wantsHashChange && this._hasHashChange, this._wantsPushState = !!this.options.pushState, this._hasPushState = !(!this.history || !this.history.pushState), this._usePushState = this._wantsPushState && this._hasPushState, this.fragment = this.getFragment(), this.root = ("/" + this.root + "/").replace(F, "/"), this._wantsHashChange && this._wantsPushState) {
                if (!this._hasPushState && !this.atRoot()) {
                    var e = this.root.slice(0, -1) || "/";
                    return this.location.replace(e + "#" + this.getPath()), !0
                }
                this._hasPushState && this.atRoot() && this.navigate(this.getHash(), {
                    replace: !0
                })
            }
            if (!this._hasHashChange && this._wantsHashChange && !this._usePushState) {
                this.iframe = document.createElement("iframe"), this.iframe.src = "javascript:0", this.iframe.style.display = "none", this.iframe.tabIndex = -1;
                var i = document.body,
                    n = i.insertBefore(this.iframe, i.firstChild).contentWindow;
                n.document.open(), n.document.close(), n.location.hash = "#" + this.fragment
            }
            var s = window.addEventListener || function(t, e) {
                return attachEvent("on" + t, e)
            };
            if (this._usePushState ? s("popstate", this.checkUrl, !1) : this._useHashChange && !this.iframe ? s("hashchange", this.checkUrl, !1) : this._wantsHashChange && (this._checkUrlInterval = setInterval(this.checkUrl, this.interval)), !this.options.silent) return this.loadUrl()
        },
        stop: function() {
            var t = window.removeEventListener || function(t, e) {
                return detachEvent("on" + t, e)
            };
            this._usePushState ? t("popstate", this.checkUrl, !1) : this._useHashChange && !this.iframe && t("hashchange", this.checkUrl, !1), this.iframe && (document.body.removeChild(this.iframe), this.iframe = null), this._checkUrlInterval && clearInterval(this._checkUrlInterval), z.started = !1
        },
        route: function(t, e) {
            this.handlers.unshift({
                route: t,
                callback: e
            })
        },
        checkUrl: function(t) {
            var e = this.getFragment();
            if (e === this.fragment && this.iframe && (e = this.getHash(this.iframe.contentWindow)), e === this.fragment) return !1;
            this.iframe && this.navigate(e), this.loadUrl()
        },
        loadUrl: function(e) {
            return !!this.matchRoot() && (e = this.fragment = this.getFragment(e), x.some(this.handlers, function(t) {
                if (t.route.test(e)) return t.callback(e), !0
            }))
        },
        navigate: function(t, e) {
            if (!z.started) return !1;
            e && !0 !== e || (e = {
                trigger: !!e
            }), t = this.getFragment(t || "");
            var i = this.root;
            "" !== t && "?" !== t.charAt(0) || (i = i.slice(0, -1) || "/");
            var n = i + t;
            t = t.replace(B, "");
            var s = this.decodeFragment(t);
            if (this.fragment !== s) {
                if (this.fragment = s, this._usePushState) this.history[e.replace ? "replaceState" : "pushState"]({}, document.title, n);
                else {
                    if (!this._wantsHashChange) return this.location.assign(n);
                    if (this._updateHash(this.location, t, e.replace), this.iframe && t !== this.getHash(this.iframe.contentWindow)) {
                        var r = this.iframe.contentWindow;
                        e.replace || (r.document.open(), r.document.close()), this._updateHash(r.location, t, e.replace)
                    }
                }
                return e.trigger ? this.loadUrl(t) : void 0
            }
        },
        _updateHash: function(t, e, i) {
            if (i) {
                var n = t.href.replace(/(javascript:|#).*$/, "");
                t.replace(n + "#" + e)
            } else t.hash = "#" + e
        }
    }), h.history = new z;
    v.extend = m.extend = M.extend = T.extend = z.extend = function(t, e) {
        var i, n = this;
        return i = t && x.has(t, "constructor") ? t.constructor : function() {
            return n.apply(this, arguments)
        }, x.extend(i, n, e), i.prototype = x.create(n.prototype, t), (i.prototype.constructor = i).__super__ = n.prototype, i
    };
    var J = function() {
            throw new Error('A "url" property or function must be specified')
        },
        L = function(e, i) {
            var n = i.error;
            i.error = function(t) {
                n && n.call(i.context, e, t, i), e.trigger("error", e, t, i)
            }
        };
    return h
});;
window.wp = window.wp || {},
    function(i) {
        var e = "undefined" == typeof _wpUtilSettings ? {} : _wpUtilSettings;
        wp.template = _.memoize(function(t) {
            var n, s = {
                evaluate: /<#([\s\S]+?)#>/g,
                interpolate: /\{\{\{([\s\S]+?)\}\}\}/g,
                escape: /\{\{([^\}]+?)\}\}(?!\})/g,
                variable: "data"
            };
            return function(e) {
                return (n = n || _.template(i("#tmpl-" + t).html(), s))(e)
            }
        }), wp.ajax = {
            settings: e.ajax || {},
            post: function(e, t) {
                return wp.ajax.send({
                    data: _.isObject(e) ? e : _.extend(t || {}, {
                        action: e
                    })
                })
            },
            send: function(e, n) {
                var t, s;
                return _.isObject(e) ? n = e : (n = n || {}).data = _.extend(n.data || {}, {
                    action: e
                }), n = _.defaults(n || {}, {
                    type: "POST",
                    url: wp.ajax.settings.url,
                    context: this
                }), (t = (s = i.Deferred(function(t) {
                    n.success && t.done(n.success), n.error && t.fail(n.error), delete n.success, delete n.error, t.jqXHR = i.ajax(n).done(function(e) {
                        "1" !== e && 1 !== e || (e = {
                            success: !0
                        }), _.isObject(e) && !_.isUndefined(e.success) ? t[e.success ? "resolveWith" : "rejectWith"](this, [e.data]) : t.rejectWith(this, [e])
                    }).fail(function() {
                        t.rejectWith(this, arguments)
                    })
                })).promise()).abort = function() {
                    return s.jqXHR.abort(), this
                }, t
            }
        }
    }(jQuery);;
window.wp = window.wp || {},
    function(e) {
        wp.Backbone = {}, wp.Backbone.Subviews = function(e, t) {
            this.view = e, this._views = _.isArray(t) ? {
                "": t
            } : t || {}
        }, wp.Backbone.Subviews.extend = Backbone.Model.extend, _.extend(wp.Backbone.Subviews.prototype, {
            all: function() {
                return _.flatten(_.values(this._views))
            },
            get: function(e) {
                return e = e || "", this._views[e]
            },
            first: function(e) {
                var t = this.get(e);
                return t && t.length ? t[0] : null
            },
            set: function(n, e, t) {
                var i, s;
                return _.isString(n) || (t = e, e = n, n = ""), t = t || {}, s = e = _.isArray(e) ? e : [e], (i = this.get(n)) && (t.add ? _.isUndefined(t.at) ? s = i.concat(e) : (s = i).splice.apply(s, [t.at, 0].concat(e)) : (_.each(s, function(e) {
                    e.__detach = !0
                }), _.each(i, function(e) {
                    e.__detach ? e.$el.detach() : e.remove()
                }), _.each(s, function(e) {
                    delete e.__detach
                }))), this._views[n] = s, _.each(e, function(e) {
                    var t = e.Views || wp.Backbone.Subviews,
                        i = e.views = e.views || new t(e);
                    i.parent = this.view, i.selector = n
                }, this), t.silent || this._attach(n, e, _.extend({
                    ready: this._isReady()
                }, t)), this
            },
            add: function(e, t, i) {
                return _.isString(e) || (i = t, t = e, e = ""), this.set(e, t, _.extend({
                    add: !0
                }, i))
            },
            unset: function(e, t, i) {
                var n;
                return _.isString(e) || (i = t, t = e, e = ""), t = t || [], (n = this.get(e)) && (t = _.isArray(t) ? t : [t], this._views[e] = t.length ? _.difference(n, t) : []), i && i.silent || _.invoke(t, "remove"), this
            },
            detach: function() {
                return e(_.pluck(this.all(), "el")).detach(), this
            },
            render: function() {
                var i = {
                    ready: this._isReady()
                };
                return _.each(this._views, function(e, t) {
                    this._attach(t, e, i)
                }, this), this.rendered = !0, this
            },
            remove: function(e) {
                return e && e.silent || (this.parent && this.parent.views && this.parent.views.unset(this.selector, this.view, {
                    silent: !0
                }), delete this.parent, delete this.selector), _.invoke(this.all(), "remove"), this._views = [], this
            },
            replace: function(e, t) {
                return e.html(t), this
            },
            insert: function(e, t, i) {
                var n, s = i && i.at;
                return _.isNumber(s) && (n = e.children()).length > s ? n.eq(s).before(t) : e.append(t), this
            },
            ready: function() {
                this.view.trigger("ready"), _.chain(this.all()).map(function(e) {
                    return e.views
                }).flatten().where({
                    attached: !0
                }).invoke("ready")
            },
            _attach: function(e, t, i) {
                var n, s = e ? this.view.$(e) : this.view.$el;
                return s.length && (n = _.chain(t).pluck("views").flatten().value(), _.each(n, function(e) {
                    e.rendered || (e.view.render(), e.rendered = !0)
                }, this), this[i.add ? "insert" : "replace"](s, _.pluck(t, "el"), i), _.each(n, function(e) {
                    e.attached = !0, i.ready && e.ready()
                }, this)), this
            },
            _isReady: function() {
                for (var e = this.view.el; e;) {
                    if (e === document.body) return !0;
                    e = e.parentNode
                }
                return !1
            }
        }), wp.Backbone.View = Backbone.View.extend({
            Subviews: wp.Backbone.Subviews,
            constructor: function(e) {
                this.views = new this.Subviews(this, this.views), this.on("ready", this.ready, this), this.options = e || {}, Backbone.View.apply(this, arguments)
            },
            remove: function() {
                var e = Backbone.View.prototype.remove.apply(this, arguments);
                return this.views && this.views.remove(), e
            },
            render: function() {
                var e;
                return this.prepare && (e = this.prepare()), this.views.detach(), this.template && (e = e || {}, this.trigger("prepare", e), this.$el.html(this.template(e))), this.views.render(), this
            },
            prepare: function() {
                return this.options
            },
            ready: function() {}
        })
    }(jQuery);;
! function(i) {
    var s = {};

    function r(t) {
        if (s[t]) return s[t].exports;
        var e = s[t] = {
            i: t,
            l: !1,
            exports: {}
        };
        return i[t].call(e.exports, e, e.exports, r), e.l = !0, e.exports
    }
    r.m = i, r.c = s, r.d = function(t, e, i) {
        r.o(t, e) || Object.defineProperty(t, e, {
            enumerable: !0,
            get: i
        })
    }, r.r = function(t) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(t, "__esModule", {
            value: !0
        })
    }, r.t = function(e, t) {
        if (1 & t && (e = r(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var i = Object.create(null);
        if (r.r(i), Object.defineProperty(i, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var s in e) r.d(i, s, function(t) {
                return e[t]
            }.bind(null, s));
        return i
    }, r.n = function(t) {
        var e = t && t.__esModule ? function() {
            return t.default
        } : function() {
            return t
        };
        return r.d(e, "a", e), e
    }, r.o = function(t, e) {
        return Object.prototype.hasOwnProperty.call(t, e)
    }, r.p = "", r(r.s = 22)
}({
    22: function(t, e, i) {
        t.exports = i(23)
    },
    23: function(t, e, i) {
        var s, r, n, a, o = jQuery;
        window.wp = window.wp || {}, a = wp.media = function(t) {
            var e, i = a.view.MediaFrame;
            if (i) return "select" === (t = _.defaults(t || {}, {
                frame: "select"
            })).frame && i.Select ? e = new i.Select(t) : "post" === t.frame && i.Post ? e = new i.Post(t) : "manage" === t.frame && i.Manage ? e = new i.Manage(t) : "image" === t.frame && i.ImageDetails ? e = new i.ImageDetails(t) : "audio" === t.frame && i.AudioDetails ? e = new i.AudioDetails(t) : "video" === t.frame && i.VideoDetails ? e = new i.VideoDetails(t) : "edit-attachments" === t.frame && i.EditAttachments && (e = new i.EditAttachments(t)), delete t.frame, a.frame = e
        }, _.extend(a, {
            model: {},
            view: {},
            controller: {},
            frames: {}
        }), n = a.model.l10n = window._wpMediaModelsL10n || {}, a.model.settings = n.settings || {}, delete n.settings, s = a.model.Attachment = i(24), r = a.model.Attachments = i(25), a.model.Query = i(26), a.model.PostImage = i(27), a.model.Selection = i(28), a.compare = function(t, e, i, s) {
            return _.isEqual(t, e) ? i === s ? 0 : s < i ? -1 : 1 : e < t ? -1 : 1
        }, _.extend(a, {
            template: wp.template,
            post: wp.ajax.post,
            ajax: wp.ajax.send,
            fit: function(t) {
                var e, i = t.width,
                    s = t.height,
                    r = t.maxWidth,
                    n = t.maxHeight;
                return _.isUndefined(r) || _.isUndefined(n) ? _.isUndefined(n) ? e = "width" : _.isUndefined(r) && n < s && (e = "height") : e = r / n < i / s ? "width" : "height", "width" === e && r < i ? {
                    width: r,
                    height: Math.round(r * s / i)
                } : "height" === e && n < s ? {
                    width: Math.round(n * i / s),
                    height: n
                } : {
                    width: i,
                    height: s
                }
            },
            truncate: function(t, e, i) {
                return e = e || 30, i = i || "&hellip;", t.length <= e ? t : t.substr(0, e / 2) + i + t.substr(-1 * e / 2)
            }
        }), a.attachment = function(t) {
            return s.get(t)
        }, r.all = new r, a.query = function(t) {
            return new r(null, {
                props: _.extend(_.defaults(t || {}, {
                    orderby: "date"
                }), {
                    query: !0
                })
            })
        }, o(window).on("unload", function() {
            window.wp = null
        })
    },
    24: function(t, e) {
        var i, n = Backbone.$;
        i = Backbone.Model.extend({
            sync: function(t, e, i) {
                return _.isUndefined(this.id) ? n.Deferred().rejectWith(this).promise() : "read" === t ? ((i = i || {}).context = this, i.data = _.extend(i.data || {}, {
                    action: "get-attachment",
                    id: this.id
                }), wp.media.ajax(i)) : "update" === t ? this.get("nonces") && this.get("nonces").update ? ((i = i || {}).context = this, i.data = _.extend(i.data || {}, {
                    action: "save-attachment",
                    id: this.id,
                    nonce: this.get("nonces").update,
                    post_id: wp.media.model.settings.post.id
                }), e.hasChanged() && (i.data.changes = {}, _.each(e.changed, function(t, e) {
                    i.data.changes[e] = this.get(e)
                }, this)), wp.media.ajax(i)) : n.Deferred().rejectWith(this).promise() : "delete" === t ? ((i = i || {}).wait || (this.destroyed = !0), i.context = this, i.data = _.extend(i.data || {}, {
                    action: "delete-post",
                    id: this.id,
                    _wpnonce: this.get("nonces").delete
                }), wp.media.ajax(i).done(function() {
                    this.destroyed = !0
                }).fail(function() {
                    this.destroyed = !1
                })) : Backbone.Model.prototype.sync.apply(this, arguments)
            },
            parse: function(t) {
                return t && (t.date = new Date(t.date), t.modified = new Date(t.modified)), t
            },
            saveCompat: function(t, s) {
                var r = this;
                return this.get("nonces") && this.get("nonces").update ? wp.media.post("save-attachment-compat", _.defaults({
                    id: this.id,
                    nonce: this.get("nonces").update,
                    post_id: wp.media.model.settings.post.id
                }, t)).done(function(t, e, i) {
                    r.set(r.parse(t, i), s)
                }) : n.Deferred().rejectWith(this).promise()
            }
        }, {
            create: function(t) {
                return wp.media.model.Attachments.all.push(t)
            },
            get: _.memoize(function(t, e) {
                return wp.media.model.Attachments.all.push(e || {
                    id: t
                })
            })
        }), t.exports = i
    },
    25: function(t, e) {
        var n = Backbone.Collection.extend({
            model: wp.media.model.Attachment,
            initialize: function(t, e) {
                e = e || {}, this.props = new Backbone.Model, this.filters = e.filters || {}, this.props.on("change", this._changeFilteredProps, this), this.props.on("change:order", this._changeOrder, this), this.props.on("change:orderby", this._changeOrderby, this), this.props.on("change:query", this._changeQuery, this), this.props.set(_.defaults(e.props || {})), e.observe && this.observe(e.observe)
            },
            _changeOrder: function() {
                this.comparator && this.sort()
            },
            _changeOrderby: function(t, e) {
                this.comparator && this.comparator !== n.comparator || (e && "post__in" !== e ? this.comparator = n.comparator : delete this.comparator)
            },
            _changeQuery: function(t, e) {
                e ? (this.props.on("change", this._requery, this), this._requery()) : this.props.off("change", this._requery, this)
            },
            _changeFilteredProps: function(r) {
                this.props.get("query") || _.chain(r.changed).map(function(t, e) {
                    var i = n.filters[e],
                        s = r.get(e);
                    if (i) {
                        if (s && !this.filters[e]) this.filters[e] = i;
                        else {
                            if (s || this.filters[e] !== i) return;
                            delete this.filters[e]
                        }
                        return !0
                    }
                }, this).any().value() && (this._source || (this._source = new n(this.models)), this.reset(this._source.filter(this.validator, this)))
            },
            validateDestroyed: !1,
            validator: function(e) {
                return !(!_.isUndefined(e.attributes.context) && "" !== e.attributes.context) && (!(!this.validateDestroyed && e.destroyed) && _.all(this.filters, function(t) {
                    return !!t.call(this, e)
                }, this))
            },
            validate: function(t, e) {
                var i = this.validator(t),
                    s = !!this.get(t.cid);
                return !i && s ? this.remove(t, e) : i && !s && this.add(t, e), this
            },
            validateAll: function(t, e) {
                return e = e || {}, _.each(t.models, function(t) {
                    this.validate(t, {
                        silent: !0
                    })
                }, this), e.silent || this.trigger("reset", this, e), this
            },
            observe: function(t) {
                return this.observers = this.observers || [], this.observers.push(t), t.on("add change remove", this._validateHandler, this), t.on("reset", this._validateAllHandler, this), this.validateAll(t), this
            },
            unobserve: function(t) {
                return t ? (t.off(null, null, this), this.observers = _.without(this.observers, t)) : (_.each(this.observers, function(t) {
                    t.off(null, null, this)
                }, this), delete this.observers), this
            },
            _validateHandler: function(t, e, i) {
                return i = e === this.mirroring ? i : {
                    silent: i && i.silent
                }, this.validate(t, i)
            },
            _validateAllHandler: function(t, e) {
                return this.validateAll(t, e)
            },
            mirror: function(t) {
                return this.mirroring && this.mirroring === t || (this.unmirror(), this.mirroring = t, this.reset([], {
                    silent: !0
                }), this.observe(t), this.trigger("attachments:received", this)), this
            },
            unmirror: function() {
                this.mirroring && (this.unobserve(this.mirroring), delete this.mirroring)
            },
            more: function(t) {
                var e = jQuery.Deferred(),
                    i = this.mirroring,
                    s = this;
                return i && i.more ? (i.more(t).done(function() {
                    this === s.mirroring && e.resolveWith(this), s.trigger("attachments:received", this)
                }), e.promise()) : e.resolveWith(this).promise()
            },
            hasMore: function() {
                return !!this.mirroring && this.mirroring.hasMore()
            },
            parse: function(t, r) {
                return _.isArray(t) || (t = [t]), _.map(t, function(t) {
                    var e, i, s;
                    return t instanceof Backbone.Model ? (e = t.get("id"), t = t.attributes) : e = t.id, s = (i = wp.media.model.Attachment.get(e)).parse(t, r), _.isEqual(i.attributes, s) || i.set(s), i
                })
            },
            _requery: function(t) {
                var e;
                this.props.get("query") && ((e = this.props.toJSON()).cache = !0 !== t, this.mirror(wp.media.model.Query.get(e)))
            },
            saveMenuOrder: function() {
                if ("menuOrder" === this.props.get("orderby")) {
                    var t = this.chain().filter(function(t) {
                        return !_.isUndefined(t.id)
                    }).map(function(t, e) {
                        return e += 1, t.set("menuOrder", e), [t.id, e]
                    }).object().value();
                    if (!_.isEmpty(t)) return wp.media.post("save-attachment-order", {
                        nonce: wp.media.model.settings.post.nonce,
                        post_id: wp.media.model.settings.post.id,
                        attachments: t
                    })
                }
            }
        }, {
            comparator: function(t, e, i) {
                var s = this.props.get("orderby"),
                    r = this.props.get("order") || "DESC",
                    n = t.cid,
                    a = e.cid;
                return t = t.get(s), e = e.get(s), "date" !== s && "modified" !== s || (t = t || new Date, e = e || new Date), i && i.ties && (n = a = null), "DESC" === r ? wp.media.compare(t, e, n, a) : wp.media.compare(e, t, a, n)
            },
            filters: {
                search: function(i) {
                    return !this.props.get("search") || _.any(["title", "filename", "description", "caption", "name"], function(t) {
                        var e = i.get(t);
                        return e && -1 !== e.search(this.props.get("search"))
                    }, this)
                },
                type: function(t) {
                    var e, i = this.props.get("type"),
                        s = t.toJSON();
                    return !(i && (!_.isArray(i) || i.length)) || (e = s.mime || s.file && s.file.type || "", _.isArray(i) ? _.find(i, function(t) {
                        return -1 !== e.indexOf(t)
                    }) : -1 !== e.indexOf(i))
                },
                uploadedTo: function(t) {
                    var e = this.props.get("uploadedTo");
                    return !!_.isUndefined(e) || e === t.get("uploadedTo")
                },
                status: function(t) {
                    var e = this.props.get("status");
                    return !!_.isUndefined(e) || e === t.get("status")
                }
            }
        });
        t.exports = n
    },
    26: function(t, e) {
        var o, h, r = wp.media.model.Attachments;
        o = r.extend({
            initialize: function(t, e) {
                var i;
                e = e || {}, r.prototype.initialize.apply(this, arguments), this.args = e.args, this._hasMore = !0, this.created = new Date, this.filters.order = function(t) {
                    var e = this.props.get("orderby"),
                        i = this.props.get("order");
                    return !this.comparator || (this.length ? 1 !== this.comparator(t, this.last(), {
                        ties: !0
                    }) : "DESC" !== i || "date" !== e && "modified" !== e ? "ASC" === i && "menuOrder" === e && 0 === t.get(e) : t.get(e) >= this.created)
                }, i = ["s", "order", "orderby", "posts_per_page", "post_mime_type", "post_parent", "author"], wp.Uploader && _(this.args).chain().keys().difference(i).isEmpty().value() && this.observe(wp.Uploader.queue)
            },
            hasMore: function() {
                return this._hasMore
            },
            more: function(t) {
                var e = this;
                return this._more && "pending" === this._more.state() ? this._more : this.hasMore() ? ((t = t || {}).remove = !1, this._more = this.fetch(t).done(function(t) {
                    (_.isEmpty(t) || -1 === this.args.posts_per_page || t.length < this.args.posts_per_page) && (e._hasMore = !1)
                })) : jQuery.Deferred().resolveWith(this).promise()
            },
            sync: function(t, e, i) {
                var s;
                return "read" === t ? ((i = i || {}).context = this, i.data = _.extend(i.data || {}, {
                    action: "query-attachments",
                    post_id: wp.media.model.settings.post.id
                }), -1 !== (s = _.clone(this.args)).posts_per_page && (s.paged = Math.round(this.length / s.posts_per_page) + 1), i.data.query = s, wp.media.ajax(i)) : (r.prototype.sync ? r.prototype : Backbone).sync.apply(this, arguments)
            }
        }, {
            defaultProps: {
                orderby: "date",
                order: "DESC"
            },
            defaultArgs: {
                posts_per_page: 40
            },
            orderby: {
                allowed: ["name", "author", "date", "title", "modified", "uploadedTo", "id", "post__in", "menuOrder"],
                valuemap: {
                    id: "ID",
                    uploadedTo: "parent",
                    menuOrder: "menu_order ID"
                }
            },
            propmap: {
                search: "s",
                type: "post_mime_type",
                perPage: "posts_per_page",
                menuOrder: "menu_order",
                uploadedTo: "post_parent",
                status: "post_status",
                include: "post__in",
                exclude: "post__not_in",
                author: "author"
            },
            get: (h = [], function(e, t) {
                var i, s = {},
                    r = o.orderby,
                    n = o.defaultProps,
                    a = !!e.cache || _.isUndefined(e.cache);
                return delete e.query, delete e.cache, _.defaults(e, n), e.order = e.order.toUpperCase(), "DESC" !== e.order && "ASC" !== e.order && (e.order = n.order.toUpperCase()), _.contains(r.allowed, e.orderby) || (e.orderby = n.orderby), _.each(["include", "exclude"], function(t) {
                    e[t] && !_.isArray(e[t]) && (e[t] = [e[t]])
                }), _.each(e, function(t, e) {
                    _.isNull(t) || (s[o.propmap[e] || e] = t)
                }), _.defaults(s, o.defaultArgs), s.orderby = r.valuemap[e.orderby] || e.orderby, a ? i = _.find(h, function(t) {
                    return _.isEqual(t.args, s)
                }) : h = [], i || (i = new o([], _.extend(t || {}, {
                    props: e,
                    args: s
                })), h.push(i)), i
            })
        }), t.exports = o
    },
    27: function(t, e) {
        var i = Backbone.Model.extend({
            initialize: function(t) {
                var e = wp.media.model.Attachment;
                this.attachment = !1, t.attachment_id && (this.attachment = e.get(t.attachment_id), this.attachment.get("url") ? (this.dfd = jQuery.Deferred(), this.dfd.resolve()) : this.dfd = this.attachment.fetch(), this.bindAttachmentListeners()), this.on("change:link", this.updateLinkUrl, this), this.on("change:size", this.updateSize, this), this.setLinkTypeFromUrl(), this.setAspectRatio(), this.set("originalUrl", t.url)
            },
            bindAttachmentListeners: function() {
                this.listenTo(this.attachment, "sync", this.setLinkTypeFromUrl), this.listenTo(this.attachment, "sync", this.setAspectRatio), this.listenTo(this.attachment, "change", this.updateSize)
            },
            changeAttachment: function(t, e) {
                this.stopListening(this.attachment), this.attachment = t, this.bindAttachmentListeners(), this.set("attachment_id", this.attachment.get("id")), this.set("caption", this.attachment.get("caption")), this.set("alt", this.attachment.get("alt")), this.set("size", e.get("size")), this.set("align", e.get("align")), this.set("link", e.get("link")), this.updateLinkUrl(), this.updateSize()
            },
            setLinkTypeFromUrl: function() {
                var t, e = this.get("linkUrl");
                e ? (t = "custom", this.attachment ? this.attachment.get("url") === e ? t = "file" : this.attachment.get("link") === e && (t = "post") : this.get("url") === e && (t = "file"), this.set("link", t)) : this.set("link", "none")
            },
            updateLinkUrl: function() {
                var t;
                switch (this.get("link")) {
                    case "file":
                        t = this.attachment ? this.attachment.get("url") : this.get("url"), this.set("linkUrl", t);
                        break;
                    case "post":
                        this.set("linkUrl", this.attachment.get("link"));
                        break;
                    case "none":
                        this.set("linkUrl", "")
                }
            },
            updateSize: function() {
                var t;
                if (this.attachment) {
                    if ("custom" === this.get("size")) return this.set("width", this.get("customWidth")), this.set("height", this.get("customHeight")), void this.set("url", this.get("originalUrl"));
                    (t = this.attachment.get("sizes")[this.get("size")]) && (this.set("url", t.url), this.set("width", t.width), this.set("height", t.height))
                }
            },
            setAspectRatio: function() {
                var t;
                this.attachment && this.attachment.get("sizes") && (t = this.attachment.get("sizes").full) ? this.set("aspectRatio", t.width / t.height) : this.set("aspectRatio", this.get("customWidth") / this.get("customHeight"))
            }
        });
        t.exports = i
    },
    28: function(t, e) {
        var i, s = wp.media.model.Attachments;
        i = s.extend({
            initialize: function(t, e) {
                s.prototype.initialize.apply(this, arguments), this.multiple = e && e.multiple, this.on("add remove reset", _.bind(this.single, this, !1))
            },
            add: function(t, e) {
                return this.multiple || this.remove(this.models), s.prototype.add.call(this, t, e)
            },
            single: function(t) {
                var e = this._single;
                return t && (this._single = t), this._single && !this.get(this._single.cid) && delete this._single, this._single = this._single || this.last(), this._single !== e && (e && (e.trigger("selection:unsingle", e, this), this.get(e.cid) || this.trigger("selection:unsingle", e, this)), this._single && this._single.trigger("selection:single", this._single, this)), this._single
            }
        }), t.exports = i
    }
});