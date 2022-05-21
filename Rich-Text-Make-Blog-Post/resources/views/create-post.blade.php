<!doctype html>
<html lang="en">

<head>
    <title> Create Post - SummerNote </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</head>
<style>
    .code-block {
        background-color: rgb(35, 39, 46);
        color: #BFC7D5;
        padding: 10px;
        border-radius: 9px;
    }
    .text-code-block{
        color: #BFC7D5;
    }

</style>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-12 text-right">
                <a href="{{ url('post') }}" class="btn btn-danger"> Back </a>
            </div>
        </div>

        <form action="{{ url('save-post') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-sm-12 col-12 m-auto">

                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('failed'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ Session::get('failed') }}
                        </div>
                    @endif

                    <div class="card shadow">

                        <div class="card-header">
                            <h4 class="card-title"> CK Editor Example in Laravel 8 </h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label> Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Enter the Title">
                            </div>
                            <div class="form-group">
                                <label> Description </label>
                                <textarea class="form-control" id="summernote" placeholder="Enter the Description"
                                    name="description"></textarea>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Save </ button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <style>
        .modal-footer p {
            display: none;
        }

    </style>
    <script>
        (function(factory) {
            /* global define */
            if (typeof define === 'function' && define.amd) {
                // AMD. Register as an anonymous module.
                define(['jquery'], factory);
            } else if (typeof module === 'object' && module.exports) {
                // Node/CommonJS
                module.exports = factory(require('jquery'));
            } else {
                // Browser globals
                factory(window.jQuery);
            }
        }(function($) {

            // Extends plugins for adding hello.
            //  - plugin is external module for customizing.
            $.extend($.summernote.plugins, {
                /**
                 * @param {Object} context - context object has status of editor.
                 */
                'addclass': function(context) {
                    var self = this;
                    if (typeof context.options.addclass === 'undefined') {
                        context.options.addclass = {};
                    }
                    if (typeof context.options.addclass.classTags === 'undefined') {
                        context.options.addclass.classTags = ["text-muted", "jumbotron", "lead",
                            "img-rounded",
                            "img-circle", "img-responsive", "btn", "btn btn-success",
                            "btn btn-danger", "btn btn-info", "btn btn-primary", "btn btn-dark",
                            "text-muted", "text-primary", "text-warning",
                            "text-danger", "text-success", "table-bordered", "table-responsive",
                            "alert", "alert alert-success", "alert alert-info",
                            "alert alert-warning", "alert alert-danger", "visible-sm", "hidden-xs",
                            "hidden-md", "hidden-lg", "hidden-print"
                        ];
                        //  console.log("Please define your summernote.options.addclass.classTags array");
                    }
                    // ui has renders to build ui elements.
                    //  - you can create a button with `ui.button`
                    var ui = $.summernote.ui;

                    addStyleString(
                        ".scrollable-menu {height: auto; max-height: 200px; max-width:300px; overflow-x: hidden;}"
                    );

                    context.memo('button.addclass', function() {
                        return ui.buttonGroup([
                            ui.button({
                                className: 'dropdown-toggle',
                                contents: '<i class="fa-brands fa-css3"\/>' + ' ' +
                                    ui.icon(context.options.icons.caret, 'span'),
                                //ui.icon(context.options.icons.magic) + ' ' + ui.icon(context.options.icons.caret, 'span'),
                                tooltip: 'toggle CSS class', //lang.style.style,
                                data: {
                                    toggle: 'dropdown'
                                }
                            }),
                            ui.dropdown({
                                className: 'dropdown-style scrollable-menu',
                                items: context.options.addclass.classTags,
                                template: function(item) {

                                    if (typeof item === 'string') {
                                        item = {
                                            tag: "div",
                                            title: item,
                                            value: item
                                        };
                                    }

                                    var tag = item.tag;
                                    var title = item.title;
                                    var style = item.style ? ' style="' + item
                                        .style + '" ' : '';
                                    var cssclass = item.value ? ' class="' +
                                        item.value + '" ' : '';


                                    return '<' + tag + ' ' + style + cssclass +
                                        '>' + title + '</' + tag + '>';
                                },
                                click: function(event, namespace, value) {

                                    event.preventDefault();
                                    value = value || $(event.target).closest(
                                        '[data-value]').data('value');



                                    var $node = $(context.invoke(
                                        "restoreTarget"))
                                    if ($node.length == 0) {
                                        $node = $(document.getSelection()
                                            .focusNode.parentElement,
                                            ".note-editable");
                                    }

                                    if (typeof context.options.addclass !==
                                        'undefined' && typeof context.options
                                        .addclass.debug !== 'undefined' &&
                                        context.options.addclass.debug) {
                                        console.debug(context.invoke(
                                                "restoreTarget"), $node,
                                            "toggling class: " + value,
                                            window.getSelection());
                                    }


                                    $node.toggleClass(value)


                                }
                            })
                        ]).render();
                        return $optionList;
                    });

                    function addStyleString(str) {
                        var node = document.createElement('style');
                        node.innerHTML = str;
                        document.body.appendChild(node);
                    }

                    // This events will be attached when editor is initialized.
                    this.events = {
                        // This will be called after modules are initialized.
                        'summernote.init': function(we, e) {
                            //console.log('summernote initialized', we, e);
                        },
                        // This will be called when user releases a key on editable.
                        'summernote.keyup': function(we, e) {
                            //  console.log('summernote keyup', we, e);
                        }
                    };

                    // This method will be called when editor is initialized by $('..').summernote();
                    // You can create elements for plugin
                    this.initialize = function() {

                    };

                    // This methods will be called when editor is destroyed by $('..').summernote('destroy');
                    // You should remove elements on `initialize`.
                    this.destroy = function() {
                        /*  this.$panel.remove();
                         this.$panel = null; */
                    };
                }
            });
        }));

        $(document).ready(function() {
            // $('.dropdown-toggle').dropdown();
            $('#summernote').summernote({
                height: 150,
                dialogsFade: true,
                dialogsInBody: true,
                tabDisable: false,
                codeviewFilter: false,
                codeviewIframeFilter: true,
                styleTags: [
                    'p',
                    {
                        title: 'Code',
                        tag: 'pre',
                        className: 'code-block',
                        value: 'pre'

                    },
                    {
                        title: 'Blockquote',
                        tag: 'blockquote',
                        className: 'blockquote',
                        value: 'blockquote'
                    },
                    'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ],
                lineHeights: ['0.2', '0.3', '0.4', '0.5', '0.6', '0.8', '1.0', '1.2', '1.4', '1.5', '1.8',
                    '2.0',
                    '3.0', '4.0'
                ],
                fontSizeUnits: ['px', 'pt', 'em', 'rem', '%'],
                fontSizes: ['1', '3', '5', '8', '9', '10', '11', '12', '14', '18', '21', '24', '36', '48',
                    '64',
                    '82', '150'
                ],
                addclass: {
                    debug: false,
                    classTags: [
                        // { Demo
                        //     title: "Button",
                        //     "value": "btn btn-success"
                        // },
                        "jumbotron", "lead", "img-rounded", "img-circle", "img-responsive",
                        "table-responsive",

                        // Buttons
                        "btn btn-primary",
                        "btn btn-secondary",
                        "btn btn-success",
                        "btn btn-danger",
                        "btn btn-warning",
                        "btn btn-info",
                        "btn btn-light",
                        "btn btn-dark",
                        "btn btn-link",
                        "btn btn-outline-primary",
                        "btn btn-outline-secondary",
                        "btn btn-outline-success",
                        "btn btn-outline-danger",
                        "btn btn-outline-warning",
                        "btn btn-outline-info",
                        "btn btn-outline-light",
                        "btn btn-outline-dark",
                        // Text
                        "text-muted",
                        "text-code-block",
                        "text-primary",
                        "text-warning",
                        "text-danger",
                        "text-success",
                        "table-bordered",
                        // badge
                        "badge rounded-pill bg-primary",
                        "badge rounded-pill bg-secondary",
                        "badge rounded-pill bg-success",
                        "badge rounded-pill bg-danger",
                        "badge rounded-pill bg-warning text-dark",
                        "badge rounded-pill bg-info text-dark",
                        "badge rounded-pill bg-light text-dark",
                        "badge rounded-pill bg-dark",
                        // Alerts
                        "alert alert-secondary",
                        "alert alert-success",
                        "alert alert-danger",
                        "alert alert-warning",
                        "alert alert-info",
                        "alert alert-light",
                        "alert alert-dark",

                        "visible-sm", "hidden-xs",
                        "hidden-md", "hidden-lg", "hidden-print"
                    ]
                },

                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['style', 'addclass']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize', 'fontsizeunit']],
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['color', ['color']],
                    ['para', ['ul', 'paragraph', 'ol']],
                    ['table', ['table']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'hr', 'link']],
                    ['misc', ['undo', 'redo']],
                    ['misc', ['fullscreen', 'codeview', 'help']],
                ],

                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                    link: [
                        ['link', ['linkDialogShow', 'unlink']]
                    ],
                    table: [
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ],
                    air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']]
                    ]
                },
            });
            // $('.dropdown-toggle').dropdown();


        });
    </script>
</body>

</html>
