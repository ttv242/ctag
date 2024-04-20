function initSparkline() {
  $(".sparkline").each(function () {
    var e = $(this);
    e.sparkline("html", e.data());
  });
}
function skinChanger() {
  $(".choose-skin li").on("click", function () {
    var e = $("#wrapper"),
      t = $(this),
      n = $(".choose-skin li.active").data("theme");
    $(".choose-skin li").removeClass("active"),
      e.removeClass("theme-" + n),
      t.addClass("active"),
      e.addClass("theme-" + t.data("theme"));
  });
}
$(function () {
  "use strict";
  initSparkline(),
    skinChanger(),
    setTimeout(function () {
      $(".page-loader-wrapper").fadeOut();
    }, 5);
}),
  $(document).ready(function () {
    $(".sidebar").metisMenu(),
      $(".btn-toggle-fullwidth").on("click", function () {
        $("body").hasClass("layout-fullwidth")
          ? $("body").removeClass("layout-fullwidth")
          : $("body").addClass("layout-fullwidth"),
          $(this).find(".fa").toggleClass("fa-arrow-left fa-arrow-right");
      }),
      $(".btn-toggle-offcanvas").on("click", function () {
        $("body").toggleClass("offcanvas-active");
      }),
      $(".right_setting").on("click", function () {
        $(".setting_div").toggleClass("open");
      }),
      $(".btn-toggle-offcanvas").on("click", function () {
        $(".sidebar").toggleClass("open");
      }),
      $(".theme-rtl input").on("change", function () {
        this.checked
          ? $("body").addClass("rtl_mode")
          : $("body").removeClass("rtl_mode");
      }),
      $("#main-content").on("click", function () {
        $("body").removeClass("offcanvas-active");
      }),
      $(".right_icon_btn").on("click", function () {
        $("body").toggleClass("right_icon_toggle");
      }),
      $(".dropdown").on("show.bs.dropdown", function () {
        $(this)
          .find(".dropdown-menu")
          .first()
          .stop(!0, !0)
          .animate({ top: "100%" }, 200);
      }),
      $(".dropdown").on("hide.bs.dropdown", function () {
        $(this)
          .find(".dropdown-menu")
          .first()
          .stop(!0, !0)
          .animate({ top: "80%" }, 200);
      }),
      $('.navbar-form.search-form input[type="text"]')
        .on("focus", function () {
          $(this).animate({ width: "+=50px" }, 300);
        })
        .on("focusout", function () {
          $(this).animate({ width: "-=50px" }, 300);
        }),
      0 < $('[data-toggle="tooltip"]').length &&
        $('[data-toggle="tooltip"]').tooltip(),
      0 < $('[data-toggle="popover"]').length &&
        $('[data-toggle="popover"]').popover(),
      $(window).on("load", function () {
        $("#main-content").height() < $("#left-sidebar").height() &&
          $("#main-content").css(
            "min-height",
            $("#left-sidebar").innerHeight() - $("footer").innerHeight()
          );
      }),
      $(window).on("load resize", function () {
        $(window).innerWidth() < 1280
          ? $("body").addClass("layout-fullwidth sidebar_toggle")
          : $("body").removeClass("layout-fullwidth sidebar_toggle");
      });
  });
var toggleSwitch = document.querySelector(
    '.theme-switch input[type="checkbox"]'
  ),
  toggleHcSwitch = document.querySelector(
    '.theme-high-contrast input[type="checkbox"]'
  ),
  currentTheme = localStorage.getItem("theme");
function switchTheme(e) {
  e.target.checked
    ? (document.documentElement.setAttribute("data-theme", "dark"),
      localStorage.setItem("theme", "dark"),
      $('.theme-high-contrast input[type="checkbox"]').prop("checked", !1))
    : (document.documentElement.setAttribute("data-theme", "light"),
      localStorage.setItem("theme", "light"));
}
function switchHc(e) {
  e.target.checked
    ? (document.documentElement.setAttribute("data-theme", "high-contrast"),
      localStorage.setItem("theme", "high-contrast"),
      $('.theme-switch input[type="checkbox"]').prop("checked", !1))
    : (document.documentElement.setAttribute("data-theme", "light"),
      localStorage.setItem("theme", "light"));
}
currentTheme &&
  (document.documentElement.setAttribute("data-theme", currentTheme),
  "dark" === currentTheme && (toggleSwitch.checked = !0),
  "high-contrast" === currentTheme &&
    ((toggleHcSwitch.checked = !0), (toggleSwitch.checked = !1))),
  toggleSwitch.addEventListener("change", switchTheme, !1),
  toggleHcSwitch.addEventListener("change", switchHc, !1),
  ($.fn.clickToggle = function (t, n) {
    return this.each(function () {
      var e = !1;
      $(this).bind("click", function () {
        return e
          ? ((e = !1), n.apply(this, arguments))
          : ((e = !0), t.apply(this, arguments));
      });
    });
  }),
  $(".select-all").on("click", function () {
    this.checked
      ? $(this)
          .parents("table")
          .find(".checkbox-tick")
          .each(function () {
            this.checked = !0;
          })
      : $(this)
          .parents("table")
          .find(".checkbox-tick")
          .each(function () {
            this.checked = !1;
          });
  }),
  $(".checkbox-tick").on("click", function () {
    $(this).parents("table").find(".checkbox-tick:checked").length ==
    $(this).parents("table").find(".checkbox-tick").length
      ? $(this).parents("table").find(".select-all").prop("checked", !0)
      : $(this).parents("table").find(".select-all").prop("checked", !1);
  }),
  $(document).ready(function () {
    "use strict";
    $(".font_setting input:radio").click(function () {
      var e = $("[name='" + this.name + "']")
        .map(function () {
          return this.value;
        })
        .get()
        .join(" ");
      console.log(e), $("body").removeClass(e).addClass(this.value);
    });
  }),
  (window.Iconic = {
    colors: {
      "theme-dark1": "#343a40",
      "theme-dark2": "#636d76",
      "theme-dark3": "#939697",
      "theme-dark4": "#c7c7c7",
      "theme-dark5": "#1c1818",
      "theme-cyan1": "#59c4bc",
      "theme-cyan2": "#637aae",
      "theme-cyan3": "#2faaa1",
      "theme-cyan4": "#4cc5bc",
      "theme-cyan5": "#89bab7",
      "theme-purple1": "#7954ad",
      "theme-purple2": "#e76886",
      "theme-purple3": "#782fdf",
      "theme-purple4": "#a06ee8",
      "theme-purple5": "#a390be",
      "theme-orange1": "#FFA901",
      "theme-orange2": "#600489",
      "theme-orange3": "#FF7F00",
      "theme-orange4": "#FBC200",
      "theme-orange5": "#38C172",
    },
  });
var Tawk_API = Tawk_API || {},
  Tawk_LoadStart = new Date();
// !(function () {
//   var e = document.createElement("script"),
//     t = document.getElementsByTagName("script")[0];
//   (e.async = !0),
//     (e.src = "https://embed..to/5c6d4867f324050cfe342c69/default"),
//     (e.charset = "UTF-8"),
//     e.setAttribute("crossorigin", "*"),
//     t.parentNode.insertBefore(e, t);
// })();
