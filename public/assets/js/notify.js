!(function (t) {
    "function" == typeof define && define.amd
        ? define(["jquery"], t)
        : "object" == typeof module && module.exports
        ? (module.exports = function (i, e) {
              return (
                  void 0 === e &&
                      (e =
                          "undefined" != typeof window
                              ? require("jquery")
                              : require("jquery")(i)),
                  t(e),
                  e
              );
          })
        : t(jQuery);
})(function (t) {
    function i(i, e, n) {
        "string" == typeof n && (n = { className: n }),
            (this.options = v(b, t.isPlainObject(n) ? n : {})),
            this.loadHTML(),
            (this.wrapper = t(p.html)),
            this.options.clickToHide && this.wrapper.addClass(o + "-hidable"),
            this.wrapper.data(o, this),
            (this.arrow = this.wrapper.find("." + o + "-arrow")),
            (this.container = this.wrapper.find("." + o + "-container")),
            this.container.append(this.userContainer),
            i &&
                i.length &&
                ((this.elementType = i.attr("type")),
                (this.originalElement = i),
                (this.elem = F(i)),
                this.elem.data(o, this),
                this.elem.before(this.wrapper)),
            this.container.hide(),
            this.run(e);
    }
    var e =
            [].indexOf ||
            function (t) {
                for (var i = 0, e = this.length; e > i; i++)
                    if (i in this && this[i] === t) return i;
                return -1;
            },
        n = "notify",
        o = n + "js",
        r = n + "!blank",
        s = {
            t: "top",
            m: "middle",
            b: "bottom",
            l: "left",
            c: "center",
            r: "right",
        },
        a = ["l", "c", "r"],
        l = ["t", "m", "b"],
        h = ["t", "b", "l", "r"],
        A = { t: "b", m: null, b: "t", l: "r", c: null, r: "l" },
        c = function (i) {
            var e;
            return (
                (e = []),
                t.each(i.split(/\W+/), function (t, i) {
                    var n;
                    return (
                        (n = i.toLowerCase().charAt(0)),
                        s[n] ? e.push(n) : void 0
                    );
                }),
                e
            );
        },
        d = {},
        p = {
            name: "core",
            html:
                '<div class="' +
                o +
                '-wrapper">\n	<div class="' +
                o +
                '-arrow"></div>\n	<div class="' +
                o +
                '-container"></div>\n</div>',
            css:
                "." +
                o +
                "-corner {\n	position: fixed;\n	margin: 5px;\n	z-index: 1050;\n}\n\n." +
                o +
                "-corner ." +
                o +
                "-wrapper,\n." +
                o +
                "-corner ." +
                o +
                "-container {\n	position: relative;\n	display: block;\n	height: inherit;\n	width: inherit;\n	margin: 3px;\n}\n\n." +
                o +
                "-wrapper {\n	z-index: 1;\n	position: absolute;\n	display: inline-block;\n	height: 0;\n	width: 0;\n}\n\n." +
                o +
                "-container {\n	display: none;\n	z-index: 1;\n	position: absolute;\n}\n\n." +
                o +
                "-hidable {\n	cursor: pointer;\n}\n\n[data-notify-text],[data-notify-html] {\n	position: relative;\n}\n\n." +
                o +
                "-arrow {\n	position: absolute;\n	z-index: 2;\n	width: 0;\n	height: 0;\n}",
        },
        u = { "border-radius": ["-webkit-", "-moz-"] },
        f = function (t) {
            return d[t];
        },
        g = function (i, e) {
            if (!i) throw "Missing Style name";
            if (!e) throw "Missing Style definition";
            if (!e.html) throw "Missing Style HTML";
            var r = d[i];
            r &&
                r.cssElem &&
                (window.console &&
                    console.warn(n + ": overwriting style '" + i + "'"),
                d[i].cssElem.remove()),
                (e.name = i),
                (d[i] = e);
            var s = "";
            e.classes &&
                t.each(e.classes, function (i, n) {
                    return (
                        (s += "." + o + "-" + e.name + "-" + i + " {\n"),
                        t.each(n, function (i, e) {
                            return (
                                u[i] &&
                                    t.each(u[i], function (t, n) {
                                        return (s +=
                                            "	" + n + i + ": " + e + ";\n");
                                    }),
                                (s += "	" + i + ": " + e + ";\n")
                            );
                        }),
                        (s += "}\n")
                    );
                }),
                e.css && (s += "/* styles for " + e.name + " */\n" + e.css),
                s &&
                    ((e.cssElem = w(s)),
                    e.cssElem.attr("id", "notify-" + e.name));
            var a = {},
                l = t(e.html);
            m("html", l, a), m("text", l, a), (e.fields = a);
        },
        w = function (i) {
            var e;
            (e = E("style")), e.attr("type", "text/css"), t("head").append(e);
            try {
                e.html(i);
            } catch (n) {
                e[0].styleSheet.cssText = i;
            }
            return e;
        },
        m = function (i, e, n) {
            var o;
            return (
                "html" !== i && (i = "text"),
                (o = "data-notify-" + i),
                y(e, "[" + o + "]").each(function () {
                    var e;
                    (e = t(this).attr(o)), e || (e = r), (n[e] = i);
                })
            );
        },
        y = function (t, i) {
            return t.is(i) ? t : t.find(i);
        },
        b = {
            clickToHide: !0,
            autoHide: !0,
            autoHideDelay: 5e3,
            arrowShow: !0,
            arrowSize: 5,
            breakNewLines: !0,
            elementPosition: "bottom",
            globalPosition: "top right",
            style: "bootstrap",
            className: "error",
            showAnimation: "slideDown",
            showDuration: 400,
            hideAnimation: "slideUp",
            hideDuration: 200,
            gap: 5,
        },
        v = function (i, e) {
            var n;
            return (
                (n = function () {}),
                (n.prototype = i),
                t.extend(!0, new n(), e)
            );
        },
        C = function (i) {
            return t.extend(b, i);
        },
        E = function (i) {
            return t("<" + i + "></" + i + ">");
        },
        x = {},
        F = function (i) {
            var e;
            return (
                i.is("[type=radio]") &&
                    ((e = i
                        .parents("form:first")
                        .find("[type=radio]")
                        .filter(function (e, n) {
                            return t(n).attr("name") === i.attr("name");
                        })),
                    (i = e.first())),
                i
            );
        },
        S = function (t, i, e) {
            var n, o;
            if ("string" == typeof e) e = parseInt(e, 10);
            else if ("number" != typeof e) return;
            if (!isNaN(e))
                return (
                    (n = s[A[i.charAt(0)]]),
                    (o = i),
                    void 0 !== t[n] && ((i = s[n.charAt(0)]), (e = -e)),
                    void 0 === t[i] ? (t[i] = e) : (t[i] += e),
                    null
                );
        },
        D = function (t, i, e) {
            if ("l" === t || "t" === t) return 0;
            if ("c" === t || "m" === t) return e / 2 - i / 2;
            if ("r" === t || "b" === t) return e - i;
            throw "Invalid alignment";
        },
        M = function (t) {
            return (M.e = M.e || E("div")), M.e.text(t).html();
        };
    (i.prototype.loadHTML = function () {
        var i;
        (i = this.getStyle()),
            (this.userContainer = t(i.html)),
            (this.userFields = i.fields);
    }),
        (i.prototype.show = function (t, i) {
            var e, n, o, r, s;
            if (
                ((n = (function (e) {
                    return function () {
                        return t || e.elem || e.destroy(), i ? i() : void 0;
                    };
                })(this)),
                (s = this.container.parent().parents(":hidden").length > 0),
                (o = this.container.add(this.arrow)),
                (e = []),
                s && t)
            )
                r = "show";
            else if (s && !t) r = "hide";
            else if (!s && t)
                (r = this.options.showAnimation),
                    e.push(this.options.showDuration);
            else {
                if (s || t) return n();
                (r = this.options.hideAnimation),
                    e.push(this.options.hideDuration);
            }
            return e.push(n), o[r].apply(o, e);
        }),
        (i.prototype.setGlobalPosition = function () {
            var i = this.getPosition(),
                e = i[0],
                n = i[1],
                r = s[e],
                a = s[n],
                l = e + "|" + n,
                h = x[l];
            if (!h) {
                h = x[l] = E("div");
                var A = {};
                (A[r] = 0),
                    "middle" === a
                        ? (A.top = "45%")
                        : "center" === a
                        ? (A.left = "45%")
                        : (A[a] = 0),
                    h.css(A).addClass(o + "-corner"),
                    t("body").append(h);
            }
            return h.prepend(this.wrapper);
        }),
        (i.prototype.setElementPosition = function () {
            var i,
                n,
                o,
                r,
                c,
                d,
                p,
                u,
                f,
                g,
                w,
                m,
                y,
                b,
                v,
                C,
                E,
                x,
                F,
                M,
                k,
                B,
                H,
                Q,
                R,
                U,
                X,
                z,
                j;
            for (
                X = this.getPosition(),
                    Q = X[0],
                    B = X[1],
                    H = X[2],
                    w = this.elem.position(),
                    u = this.elem.outerHeight(),
                    m = this.elem.outerWidth(),
                    f = this.elem.innerHeight(),
                    g = this.elem.innerWidth(),
                    j = this.wrapper.position(),
                    c = this.container.height(),
                    d = this.container.width(),
                    x = s[Q],
                    M = A[Q],
                    k = s[M],
                    p = {},
                    p[k] = "b" === Q ? u : "r" === Q ? m : 0,
                    S(p, "top", w.top - j.top),
                    S(p, "left", w.left - j.left),
                    z = ["top", "left"],
                    b = 0,
                    C = z.length;
                C > b;
                b++
            )
                (R = z[b]),
                    (F = parseInt(this.elem.css("margin-" + R), 10)),
                    F && S(p, R, F);
            if (
                ((y = Math.max(
                    0,
                    this.options.gap - (this.options.arrowShow ? o : 0)
                )),
                S(p, k, y),
                this.options.arrowShow)
            ) {
                for (
                    o = this.options.arrowSize,
                        n = t.extend({}, p),
                        i =
                            this.userContainer.css("border-color") ||
                            this.userContainer.css("border-top-color") ||
                            this.userContainer.css("background-color") ||
                            "white",
                        v = 0,
                        E = h.length;
                    E > v;
                    v++
                )
                    (R = h[v]),
                        (U = s[R]),
                        R !== M &&
                            ((r = U === x ? i : "transparent"),
                            (n["border-" + U] = o + "px solid " + r));
                S(p, s[M], o), e.call(h, B) >= 0 && S(n, s[B], 2 * o);
            } else this.arrow.hide();
            return (
                e.call(l, Q) >= 0
                    ? (S(p, "left", D(B, d, m)), n && S(n, "left", D(B, o, g)))
                    : e.call(a, Q) >= 0 &&
                      (S(p, "top", D(B, c, u)), n && S(n, "top", D(B, o, f))),
                this.container.is(":visible") && (p.display = "block"),
                this.container.removeAttr("style").css(p),
                n ? this.arrow.removeAttr("style").css(n) : void 0
            );
        }),
        (i.prototype.getPosition = function () {
            var t, i, n, o, r, s, A, d;
            if (
                ((d =
                    this.options.position ||
                    (this.elem
                        ? this.options.elementPosition
                        : this.options.globalPosition)),
                (t = c(d)),
                0 === t.length && (t[0] = "b"),
                (i = t[0]),
                e.call(h, i) < 0)
            )
                throw "Must be one of [" + h + "]";
            return (
                (1 === t.length ||
                    ((n = t[0]),
                    e.call(l, n) >= 0 && ((o = t[1]), e.call(a, o) < 0)) ||
                    ((r = t[0]),
                    e.call(a, r) >= 0 && ((s = t[1]), e.call(l, s) < 0))) &&
                    (t[1] = ((A = t[0]), e.call(a, A) >= 0 ? "m" : "l")),
                2 === t.length && (t[2] = t[1]),
                t
            );
        }),
        (i.prototype.getStyle = function (t) {
            var i;
            if (
                (t || (t = this.options.style),
                t || (t = "default"),
                (i = d[t]),
                !i)
            )
                throw "Missing style: " + t;
            return i;
        }),
        (i.prototype.updateClasses = function () {
            var i, e;
            return (
                (i = ["base"]),
                t.isArray(this.options.className)
                    ? (i = i.concat(this.options.className))
                    : this.options.className && i.push(this.options.className),
                (e = this.getStyle()),
                (i = t
                    .map(i, function (t) {
                        return o + "-" + e.name + "-" + t;
                    })
                    .join(" ")),
                this.userContainer.attr("class", i)
            );
        }),
        (i.prototype.run = function (i, e) {
            var n, o, s, a, l;
            if (
                (t.isPlainObject(e)
                    ? t.extend(this.options, e)
                    : "string" === t.type(e) && (this.options.className = e),
                this.container && !i)
            )
                return void this.show(!1);
            if (this.container || i) {
                (o = {}), t.isPlainObject(i) ? (o = i) : (o[r] = i);
                for (s in o)
                    (n = o[s]),
                        (a = this.userFields[s]),
                        a &&
                            ("text" === a &&
                                ((n = M(n)),
                                this.options.breakNewLines &&
                                    (n = n.replace(/\n/g, "<br/>"))),
                            (l = s === r ? "" : "=" + s),
                            y(
                                this.userContainer,
                                "[data-notify-" + a + l + "]"
                            ).html(n));
                this.updateClasses(),
                    this.elem
                        ? this.setElementPosition()
                        : this.setGlobalPosition(),
                    this.show(!0),
                    this.options.autoHide &&
                        (clearTimeout(this.autohideTimer),
                        (this.autohideTimer = setTimeout(
                            this.show.bind(this, !1),
                            this.options.autoHideDelay
                        )));
            }
        }),
        (i.prototype.destroy = function () {
            this.wrapper.data(o, null), this.wrapper.remove();
        }),
        (t[n] = function (e, o, r) {
            return (
                (e && e.nodeName) || e.jquery
                    ? t(e)[n](o, r)
                    : ((r = o), (o = e), new i(null, o, r)),
                e
            );
        }),
        (t.fn[n] = function (e, n) {
            return (
                t(this).each(function () {
                    var r = F(t(this)).data(o);
                    r && r.destroy();
                    new i(t(this), e, n);
                }),
                this
            );
        }),
        t.extend(t[n], {
            defaults: C,
            addStyle: g,
            pluginOptions: b,
            getStyle: f,
            insertCSS: w,
        }),
        g("bootstrap", {
            html: "<div>\n<span data-notify-text></span>\n</div>",
            classes: {
                base: {
                    "font-weight": "bold",
                    padding: "8px 15px 8px 14px",
                    "text-shadow": "0 1px 0 rgba(255, 255, 255, 0.5)",
                    "background-color": "#fcf8e3",
                    border: "1px solid #fbeed5",
                    "border-radius": "4px",
                    "white-space": "nowrap",
                    "padding-left": "25px",
                    "background-repeat": "no-repeat",
                    "background-position": "3px 7px",
                },
                error: {
                    color: "#B94A48",
                    "background-color": "#F2DEDE",
                    "border-color": "#EED3D7",
                    "background-image":
                        "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAtRJREFUeNqkVc1u00AQHq+dOD+0poIQfkIjalW0SEGqRMuRnHos3DjwAH0ArlyQeANOOSMeAA5VjyBxKBQhgSpVUKKQNGloFdw4cWw2jtfMOna6JOUArDTazXi/b3dm55socPqQhFka++aHBsI8GsopRJERNFlY88FCEk9Yiwf8RhgRyaHFQpPHCDmZG5oX2ui2yilkcTT1AcDsbYC1NMAyOi7zTX2Agx7A9luAl88BauiiQ/cJaZQfIpAlngDcvZZMrl8vFPK5+XktrWlx3/ehZ5r9+t6e+WVnp1pxnNIjgBe4/6dAysQc8dsmHwPcW9C0h3fW1hans1ltwJhy0GxK7XZbUlMp5Ww2eyan6+ft/f2FAqXGK4CvQk5HueFz7D6GOZtIrK+srupdx1GRBBqNBtzc2AiMr7nPplRdKhb1q6q6zjFhrklEFOUutoQ50xcX86ZlqaZpQrfbBdu2R6/G19zX6XSgh6RX5ubyHCM8nqSID6ICrGiZjGYYxojEsiw4PDwMSL5VKsC8Yf4VRYFzMzMaxwjlJSlCyAQ9l0CW44PBADzXhe7xMdi9HtTrdYjFYkDQL0cn4Xdq2/EAE+InCnvADTf2eah4Sx9vExQjkqXT6aAERICMewd/UAp/IeYANM2joxt+q5VI+ieq2i0Wg3l6DNzHwTERPgo1ko7XBXj3vdlsT2F+UuhIhYkp7u7CarkcrFOCtR3H5JiwbAIeImjT/YQKKBtGjRFCU5IUgFRe7fF4cCNVIPMYo3VKqxwjyNAXNepuopyqnld602qVsfRpEkkz+GFL1wPj6ySXBpJtWVa5xlhpcyhBNwpZHmtX8AGgfIExo0ZpzkWVTBGiXCSEaHh62/PoR0p/vHaczxXGnj4bSo+G78lELU80h1uogBwWLf5YlsPmgDEd4M236xjm+8nm4IuE/9u+/PH2JXZfbwz4zw1WbO+SQPpXfwG/BBgAhCNZiSb/pOQAAAAASUVORK5CYII=)",
                },
                success: {
                    color: "#468847",
                    "background-color": "#DFF0D8",
                    "border-color": "#D6E9C6",
                    "background-image":
                        "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAutJREFUeNq0lctPE0Ecx38zu/RFS1EryqtgJFA08YCiMZIAQQ4eRG8eDGdPJiYeTIwHTfwPiAcvXIwXLwoXPaDxkWgQ6islKlJLSQWLUraPLTv7Gme32zoF9KSTfLO7v53vZ3d/M7/fIth+IO6INt2jjoA7bjHCJoAlzCRw59YwHYjBnfMPqAKWQYKjGkfCJqAF0xwZjipQtA3MxeSG87VhOOYegVrUCy7UZM9S6TLIdAamySTclZdYhFhRHloGYg7mgZv1Zzztvgud7V1tbQ2twYA34LJmF4p5dXF1KTufnE+SxeJtuCZNsLDCQU0+RyKTF27Unw101l8e6hns3u0PBalORVVVkcaEKBJDgV3+cGM4tKKmI+ohlIGnygKX00rSBfszz/n2uXv81wd6+rt1orsZCHRdr1Imk2F2Kob3hutSxW8thsd8AXNaln9D7CTfA6O+0UgkMuwVvEFFUbbAcrkcTA8+AtOk8E6KiQiDmMFSDqZItAzEVQviRkdDdaFgPp8HSZKAEAL5Qh7Sq2lIJBJwv2scUqkUnKoZgNhcDKhKg5aH+1IkcouCAdFGAQsuWZYhOjwFHQ96oagWgRoUov1T9kRBEODAwxM2QtEUl+Wp+Ln9VRo6BcMw4ErHRYjH4/B26AlQoQQTRdHWwcd9AH57+UAXddvDD37DmrBBV34WfqiXPl61g+vr6xA9zsGeM9gOdsNXkgpEtTwVvwOklXLKm6+/p5ezwk4B+j6droBs2CsGa/gNs6RIxazl4Tc25mpTgw/apPR1LYlNRFAzgsOxkyXYLIM1V8NMwyAkJSctD1eGVKiq5wWjSPdjmeTkiKvVW4f2YPHWl3GAVq6ymcyCTgovM3FzyRiDe2TaKcEKsLpJvNHjZgPNqEtyi6mZIm4SRFyLMUsONSSdkPeFtY1n0mczoY3BHTLhwPRy9/lzcziCw9ACI+yql0VLzcGAZbYSM5CCSZg1/9oc/nn7+i8N9p/8An4JMADxhH+xHfuiKwAAAABJRU5ErkJggg==)",
                },
                info: {
                    color: "#3A87AD",
                    "background-color": "#D9EDF7",
                    "border-color": "#BCE8F1",
                    "background-image":
                        "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QYFAhkSsdes/QAAA8dJREFUOMvVlGtMW2UYx//POaWHXg6lLaW0ypAtw1UCgbniNOLcVOLmAjHZolOYlxmTGXVZdAnRfXQm+7SoU4mXaOaiZsEpC9FkiQs6Z6bdCnNYruM6KNBw6YWewzl9z+sHImEWv+vz7XmT95f/+3/+7wP814v+efDOV3/SoX3lHAA+6ODeUFfMfjOWMADgdk+eEKz0pF7aQdMAcOKLLjrcVMVX3xdWN29/GhYP7SvnP0cWfS8caSkfHZsPE9Fgnt02JNutQ0QYHB2dDz9/pKX8QjjuO9xUxd/66HdxTeCHZ3rojQObGQBcuNjfplkD3b19Y/6MrimSaKgSMmpGU5WevmE/swa6Oy73tQHA0Rdr2Mmv/6A1n9w9suQ7097Z9lM4FlTgTDrzZTu4StXVfpiI48rVcUDM5cmEksrFnHxfpTtU/3BFQzCQF/2bYVoNbH7zmItbSoMj40JSzmMyX5qDvriA7QdrIIpA+3cdsMpu0nXI8cV0MtKXCPZev+gCEM1S2NHPvWfP/hL+7FSr3+0p5RBEyhEN5JCKYr8XnASMT0xBNyzQGQeI8fjsGD39RMPk7se2bd5ZtTyoFYXftF6y37gx7NeUtJJOTFlAHDZLDuILU3j3+H5oOrD3yWbIztugaAzgnBKJuBLpGfQrS8wO4FZgV+c1IxaLgWVU0tMLEETCos4xMzEIv9cJXQcyagIwigDGwJgOAtHAwAhisQUjy0ORGERiELgG4iakkzo4MYAxcM5hAMi1WWG1yYCJIcMUaBkVRLdGeSU2995TLWzcUAzONJ7J6FBVBYIggMzmFbvdBV44Corg8vjhzC+EJEl8U1kJtgYrhCzgc/vvTwXKSib1paRFVRVORDAJAsw5FuTaJEhWM2SHB3mOAlhkNxwuLzeJsGwqWzf5TFNdKgtY5qHp6ZFf67Y/sAVadCaVY5YACDDb3Oi4NIjLnWMw2QthCBIsVhsUTU9tvXsjeq9+X1d75/KEs4LNOfcdf/+HthMnvwxOD0wmHaXr7ZItn2wuH2SnBzbZAbPJwpPx+VQuzcm7dgRCB57a1uBzUDRL4bfnI0RE0eaXd9W89mpjqHZnUI5Hh2l2dkZZUhOqpi2qSmpOmZ64Tuu9qlz/SEXo6MEHa3wOip46F1n7633eekV8ds8Wxjn37Wl63VVa+ej5oeEZ/82ZBETJjpJ1Rbij2D3Z/1trXUvLsblCK0XfOx0SX2kMsn9dX+d+7Kf6h8o4AIykuffjT8L20LU+w4AZd5VvEPY+XpWqLV327HR7DzXuDnD8r+ovkBehJ8i+y8YAAAAASUVORK5CYII=)",
                },
                warn: {
                    color: "#C09853",
                    "background-color": "#FCF8E3",
                    "border-color": "#FBEED5",
                    "background-image":
                        "url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAABJlBMVEXr6eb/2oD/wi7/xjr/0mP/ykf/tQD/vBj/3o7/uQ//vyL/twebhgD/4pzX1K3z8e349vK6tHCilCWbiQymn0jGworr6dXQza3HxcKkn1vWvV/5uRfk4dXZ1bD18+/52YebiAmyr5S9mhCzrWq5t6ufjRH54aLs0oS+qD751XqPhAybhwXsujG3sm+Zk0PTwG6Shg+PhhObhwOPgQL4zV2nlyrf27uLfgCPhRHu7OmLgAafkyiWkD3l49ibiAfTs0C+lgCniwD4sgDJxqOilzDWowWFfAH08uebig6qpFHBvH/aw26FfQTQzsvy8OyEfz20r3jAvaKbhgG9q0nc2LbZxXanoUu/u5WSggCtp1anpJKdmFz/zlX/1nGJiYmuq5Dx7+sAAADoPUZSAAAAAXRSTlMAQObYZgAAAAFiS0dEAIgFHUgAAAAJcEhZcwAACxMAAAsTAQCanBgAAAAHdElNRQfdBgUBGhh4aah5AAAAlklEQVQY02NgoBIIE8EUcwn1FkIXM1Tj5dDUQhPU502Mi7XXQxGz5uVIjGOJUUUW81HnYEyMi2HVcUOICQZzMMYmxrEyMylJwgUt5BljWRLjmJm4pI1hYp5SQLGYxDgmLnZOVxuooClIDKgXKMbN5ggV1ACLJcaBxNgcoiGCBiZwdWxOETBDrTyEFey0jYJ4eHjMGWgEAIpRFRCUt08qAAAAAElFTkSuQmCC)",
                },
            },
        }),
        t(function () {
            w(p.css).attr("id", "core-notify"),
                t(document).on("click", "." + o + "-hidable", function (i) {
                    t(this).trigger("notify-hide");
                }),
                t(document).on(
                    "notify-hide",
                    "." + o + "-wrapper",
                    function (i) {
                        var e = t(this).data(o);
                        e && e.show(!1);
                    }
                );
        });
});
//# sourceMappingURL=./notify.min.js.map
