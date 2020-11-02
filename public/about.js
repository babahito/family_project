(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["about"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shop/User.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/shop/User.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  data: function data() {
    return {
      users: [],
      page: 1
    };
  },
  methods: {
    userDelete: function userDelete(index, id) {
      var _this = this;

      axios["delete"]('/api/user/' + id).then(function (response) {
        _this.users.slice(id, 1);

        alert("削除します");
      })["catch"](function (error) {
        return console.log(error);
      });
    }
  },
  created: function created() {
    var _this2 = this;

    axios.get('/api/user').then(function (response) {
      _this2.users = response.data.users; // this.tabledate=response.data.users;
    })["catch"](function (error) {
      console.log(error);
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shop/User.vue?vue&type=template&id=421330ae&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/shop/User.vue?vue&type=template&id=421330ae& ***!
  \************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "v-app",
    [
      _c("h1", [_vm._v("ユーザー一覧")]),
      _vm._v(" "),
      _c(
        "router-link",
        { attrs: { to: "/shop/user/create" } },
        [
          _c(
            "v-btn",
            {
              staticClass: "mx-2",
              attrs: { fab: "", dark: "", color: "cyan lighten-4" }
            },
            [_c("v-icon", { attrs: { dark: "" } }, [_vm._v("mdi-plus")])],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("v-simple-table", {
        scopedSlots: _vm._u([
          {
            key: "default",
            fn: function() {
              return [
                _c("thead", [
                  _c("tr", [
                    _c("th", { staticClass: "text-left" }, [_vm._v("名前")]),
                    _vm._v(" "),
                    _c("th", { staticClass: "text-left" }, [
                      _vm._v("メールアドレス")
                    ]),
                    _vm._v(" "),
                    _c(
                      "th",
                      { staticClass: "text-left" },
                      [_c("v-icon", { attrs: { dark: "" } }, [_vm._v("詳細")])],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "th",
                      { staticClass: "text-left" },
                      [_c("v-icon", { attrs: { dark: "" } }, [_vm._v("編集")])],
                      1
                    ),
                    _vm._v(" "),
                    _c("th", { staticClass: "text-left" }, [_vm._v("削除")])
                  ])
                ]),
                _vm._v(" "),
                _c(
                  "tbody",
                  _vm._l(_vm.users, function(user, index) {
                    return _c("tr", { key: index }, [
                      _c("td", [_vm._v(_vm._s(user.name))]),
                      _vm._v(" "),
                      _c("td", [_vm._v(_vm._s(user.email))]),
                      _vm._v(" "),
                      _c(
                        "td",
                        [
                          _c(
                            "router-link",
                            { attrs: { to: "/shop/user/" + user.id } },
                            [_c("v-icon", [_vm._v("mdi-details")])],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "td",
                        [
                          _c(
                            "router-link",
                            {
                              attrs: { to: "/shop/user/" + user.id + "/edit/" }
                            },
                            [_c("v-icon", [_vm._v("mdi-pencil-outline")])],
                            1
                          )
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c("td", [
                        _c(
                          "button",
                          {
                            staticClass: "btn btn-danger",
                            on: {
                              click: function($event) {
                                return _vm.userDelete(index, user.id)
                              }
                            }
                          },
                          [_c("v-icon", [_vm._v("mdi-delete-empty-outline")])],
                          1
                        )
                      ])
                    ])
                  }),
                  0
                )
              ]
            },
            proxy: true
          }
        ])
      }),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "text-center" },
        [
          _c("v-pagination", {
            attrs: { length: 4, circle: "" },
            model: {
              value: _vm.page,
              callback: function($$v) {
                _vm.page = $$v
              },
              expression: "page"
            }
          })
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/shop/User.vue":
/*!***********************************************!*\
  !*** ./resources/js/components/shop/User.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _User_vue_vue_type_template_id_421330ae___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./User.vue?vue&type=template&id=421330ae& */ "./resources/js/components/shop/User.vue?vue&type=template&id=421330ae&");
/* harmony import */ var _User_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./User.vue?vue&type=script&lang=js& */ "./resources/js/components/shop/User.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _User_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _User_vue_vue_type_template_id_421330ae___WEBPACK_IMPORTED_MODULE_0__["render"],
  _User_vue_vue_type_template_id_421330ae___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/shop/User.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/shop/User.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/components/shop/User.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_User_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./User.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shop/User.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_User_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/shop/User.vue?vue&type=template&id=421330ae&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/shop/User.vue?vue&type=template&id=421330ae& ***!
  \******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_User_vue_vue_type_template_id_421330ae___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./User.vue?vue&type=template&id=421330ae& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shop/User.vue?vue&type=template&id=421330ae&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_User_vue_vue_type_template_id_421330ae___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_User_vue_vue_type_template_id_421330ae___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);