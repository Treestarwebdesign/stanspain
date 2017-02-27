'use strict';
var Stannah = {};

if (!(window.console && console.log))
{
    (function ()
    {
        var noop = function () { };
        var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'markTimeline', 'table', 'time', 'timeEnd', 'timeStamp', 'trace', 'warn'];
        var length = methods.length;
        var console = window.console = {};
        while (length--)
        {
            console[methods[length]] = noop;
        }
    }());
}


/*
    Plugin initialisation
*/
Stannah.Plugins =
{    
    Init: function ()
    {
        Stannah.Plugins.CustomiseDropDowns();
        Stannah.Plugins.TabsToAccordion();
        Stannah.Plugins.EqualHeightRows();
        Stannah.Plugins.jQueryUIDatePicker();
    },

    CustomiseDropDowns: function ()
    {
        $('.chosen-select').chosen({
            disable_search: true,
            width: "100%"
        });       
    },

    EqualHeightRows: function ()
    {
        var selectors = [
            '.img-tick-boxes .img-tick-box',
            '.product-listing-content .arrow-box-grey',
            '.row .col-sm-6 .arrow-box-grey',
            '.row .col-sm-6 .grey-content-box',
            '.row .col-sm-6 .box-white-bg',
            '.date-list .row > div',
            '.spotlight-item .spotlight-content .spotlight-details'
        ];

        $(selectors.join()).matchHeight();

        if ($(window).width() > 767) {
            //!* Warning, this will not fire on screen re-sizing.
            $('.row .col-sm-6 .white-box-shadow').matchHeight();
        }

        //This was not executing in the right order inside the main Selector Query,
        $('.row .col-sm-6 .box-white-bg').matchHeight();
    },

    jQueryUIDatePicker: function() {
        if($('body').hasClass('page-template-page-contact-us')) {
            $('#callbackDate').datepicker();
        } 
    },

    TabsToAccordion: (function($, $Dom) {
        var api = {
            Init: function () {
                if ($().tabCollapse) {
                    
                    $Dom.find('ul.nav.nav-tabs').tabCollapse({
                        tabsClass: ' hidden-xs',
                        accordionClass: 'visible-sm-accordian visible-xs'
                    });

                    //Fix for when you see the accordian from the bottom
                    $Dom.find('.panel-heading').on('click', function () {
                        alert("Run");
                        if ($(this).next().css('display') === 'none') {
                            window.scroll(0, $('.div-white.help-advice').offset().top);
                        }
                    });
                    
                }
            }
        };
        return api.Init;
    }(jQuery, $('html')))
};

/*
    Custom behaviours
*/
Stannah.UI =
{
    Init: function() {
        Stannah.UI.BindProductStories();
        Stannah.UI.BindProductSpotlights();
        Stannah.UI.DealerFinderWidget.Init();
        Stannah.UI.ProductCustomiser.Init();
        Stannah.UI.CatchShareButtons();
        Stannah.UI.DealerIndexList.Init();
        Stannah.UI.DealerList.Init();
        Stannah.UI.MakeTelLinks();
        Stannah.UI.StylingOptionsPicker();
        Stannah.UI.SimpleStepTabsButtons();
        Stannah.UI.CountryChooser();
        Stannah.UI.ProductListingImages();
        Stannah.UI.SimpleStepTabsGet();
        Stannah.UI.ModalControls();
        Stannah.UI.SmoothScrolling();
        Stannah.UI.SetDealerCookie();
        Stannah.UI.LanguagePicker();
    },

    LanguagePicker: function() {
        //Cache el
        var langs = $('.mlp_language_box');
        //Get the selected language el
        if ($(langs).length > 0) {
            var selectedLang = $(langs).find('a.current-language-item');
            //Set the container to the text found in the selectLang el
            $('.lang-menu .current-language').text($(selectedLang).text());
            //Nice fade on load to alert user
            $('.lang-menu').delay(200).fadeIn(500);
            //Click even on the menu
            $('.current-language').on('click',function(e) {
                e.preventDefault();
                var parent = $(this).parent();
                if( $(parent).hasClass('open') ) {
                   $(langs).slideUp(200, function() {
                        $(parent).toggleClass('open');
                   });
                } else {
                   $(langs).slideDown(200);
                   $(parent).toggleClass('open');
                }

            });
            //Click on document and not menu and menu open close it
            $(document).click(function(event) { 
                if(!$(event.target).closest('.lang-menu').length) {
                    if($(langs).is(":visible")) {
                        $(langs).slideUp(200);
                        $('.lang-menu.open').removeClass('open');
                    }
                }   
            });
        }
    },

    ModalControls: function() {
        $('.in-content-modal .close-btn').on('click',function() {
            $(this).closest('.in-content-modal').slideUp(500);
        });
        $('#final-thank-you').delay(5500).slideUp(500);
    },

    CountryChooser: function() {
        $('.footer .chosen-select').on('change', function() {
            var el = $(this);
            var elVal = el.val();
            if (elVal != "") {
                window.open(elVal, '_blank').focus();
            }
        });
    },

    SetDealerCookie: function() {
        $(document).on('click', '.page-template-page-list-dealers .dealer-name a, .page-template-page-list-dealers .dealer-link a', function(e) {

            var el = $(this);
            //get dealer details
            var name = $(el).parents('tr').find('.dealer-name a').text();
            var address = $(el).parents('tr').find('.dealer-address').text();
            var phone = $(el).parents('tr').find('.dealer-address').data('phone');
            var link = $(el).attr('href');
            var expires = 10 * 365 * 24 * 60 * 60;

            document.cookie="stannah-dealer-name="+ name +"; expires="+ expires +"; path=/";
            document.cookie="stannah-dealer-address="+ address +"; expires="+ expires +"; path=/";
            document.cookie="stannah-dealer-phone="+ phone +"; expires="+ expires +"; path=/";
            document.cookie="stannah-dealer-link="+ link +"; expires="+ expires +"; path=/";

        });
    },

    SmoothScrolling: function() {
        $('a[href*=#]:not([href=#])').click(function() {
            //If the attr is not present
            if (!$(this).attr('data-toggle')) {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                  var target = $(this.hash);
                  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                  if (target.length) {
                    $('html,body').animate({
                      scrollTop: target.offset().top
                    }, 1000);
                    return false;
                  }
                }
            }
        });
    },

    ProductListingImages: function() {
        $('.product-gallery .product-thumbnails img').on('click', function() {
            var el = $(this);
            var src = $(this).attr('src');
            el.closest(".product-gallery").find('span img').attr('src', src);
        });
    },

    StylingOptionsPicker: function() {
        var mainImageEl = '.product-customizer-preview';
        var swatchesEl = '.product-customizer-options ul li';
        $(swatchesEl).on('click', function() {
            var el = $(this);
            //Get the image src from data attr
            var mainChairImg = $(el).children('img').data('main-image');
            //Get the alt text from the data attr
            var mainChairDesc = $(el).children('img').attr('data-description');
            //Sort the status classes out
            $(swatchesEl).removeClass('active');
            $(el).addClass('active');
            //Update the product info window with alt and src we just collected.
            $(mainImageEl).children('img').attr('src', mainChairImg).attr('data-description', mainChairDesc);
            $(mainImageEl).children('span').text(mainChairDesc);
        });
    },

    //Button at bottom of page that move to next tab
    SimpleStepTabsButtons: function() {
        $('.tab-pane-cta a').on('click', function(e) {
            e.preventDefault();
            var el = $(this);
            $('.'+el.data('tab-step')).children('a').trigger('click');
            $("html, body").animate({ scrollTop: 0}, 1000);
        });
    },
    //Catch get param for simple steps tabs and switch tab 
    SimpleStepTabsGet: function() {
        function getParameterByName(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }
        if ($('body').hasClass('page-template-page-3-simple-steps')) {
            
            var paramValue = getParameterByName("tab");

            if ( paramValue == 1 || paramValue == 2 || paramValue == 3 ) {
                $('.step-'+paramValue).children('a').trigger('click');
            }
        }
    },

    BindProductStories: function() {
        $('.product-story .cta').click(function() {
            var $this = $(this);
            var $label = $(this).children('span');
            var $story = $this.parents('.product-story');
            var $content = $this.siblings('.product-story-content')

            if ($story.hasClass('open')) {
                // Close the story
                $content.slideUp(350, function() {
                    $story.removeClass('open');
                });

                // Setup the button label
                $this.attr('data-labelwhenopen', $label.text());
                $label.text($this.attr('data-labelwhenclosed'));
            } else {
                // Open the story
                $story.addClass('open');
                $content.slideDown(400);

                // Setup the button label
                $this.attr('data-labelwhenclosed', $label.text());
                $label.text($this.attr('data-labelwhenopen'));
            }
        });
    },

    BindProductSpotlights: function() {
        var $spotlights = $('.product-spotlight');
        $spotlights.each(function() {
            var $spotlight = $(this);
            var $previewLink = $spotlight.find('.image-container img');
            var $previewImg = $spotlight.find('.image-container img');
            var $thumbnails = $spotlight.find('.navbar li');

            $thumbnails.bind('click', function() {
                var $activeThumbnail = $(this);
                var $activeThumbnailImg = $activeThumbnail.find('img');

                // Set the active state
                $thumbnails.removeClass('active');
                $activeThumbnail.addClass('active');

                // Switch the preview image
                $previewImg.attr('src', $activeThumbnailImg.attr('data-previewimg'));
                $previewLink.attr('href', $activeThumbnailImg.attr('data-largeimg'));

            });
        });
    },

    CatchShareButtons: function(popUpHeight, popUpWidth) {
        var $buttons = $('.social-icons-list a');
        $($buttons).on('click', function(e) {
            e.preventDefault();
            //Get share URL
            var buttonURL = $(this).attr('href');
            //Open window
            window.open(buttonURL, 'share_window', 'height='+popUpHeight+',width='+popUpWidth+',top=400,left=400');
        });

    },

    MakeTelLinks: function() {
        $('a[href*="tel:"]').each(function() {
            //Only on mobile devices
            if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
                var telNumber = $(this).text();
                //Remove the - from phone numbers
                var resNumber = telNumber.split("-").join("");
                resNumber = resNumber.split(" ").join("");
                resNumber = resNumber.split("(").join("");
                    resNumber = resNumber.split(")").join("");
                $(this).attr('href', 'tel:'+resNumber);
            } else {
                $(this).replaceWith(function () {
                    return $('<a class="no-click ga-number" />').append($(this).contents());
                });
                $('a.no-click').click(function(e) {
                    e.preventDefault();
                })
            }
        });
    },

    DealerIndexList: (function($, $Dom, undef) {
        var internal = {
            Settings: {
                GoogleDocsUrl: 'https://docs.google.com/spreadsheets/d/1sKlZvF4Ub6wd96G12lgONLNNKrCV2gWcoXnHLn_7L-I/edit?pli=1#gid=545257975',
                //Selector for lists injection
                ResultsTable: '.dealer-directory-nav select',
                ResultsTemplate: '#index-template',
                SqlQuery: "select * where D is not null AND D != ''"
            },
            Data: {
                LoadFromSource: function(googleDocsUrl, query, callback) {
                    if($(internal.Settings.ResultsTemplate).length > 0) {
                        var trTemplate = Handlebars.compile($Dom.find(internal.Settings.ResultsTemplate).html());
                        $Dom.find(internal.Settings.ResultsTable).sheetrock({
                            url: googleDocsUrl,
                            headersOff: true,
                            rowHandler: trTemplate,
                            sql: query,
                            resetStatus: false,
                            rowGroups: false,
                            userCallback: function() {
                            }
                        });
                    }
                }                
            },
        },
        api = {
            Init: function() {
                //Run function to call in the sheetrock code
                internal.Data.LoadFromSource(internal.Settings.GoogleDocsUrl, internal.Settings.SqlQuery);
            }
        };
        return api;
    }(jQuery, jQuery('html'))),

    DealerList: (function($, $Dom, undef) {
        var internal = {
            Settings: {
                GoogleDocsUrl: 'https://docs.google.com/spreadsheets/d/1sKlZvF4Ub6wd96G12lgONLNNKrCV2gWcoXnHLn_7L-I/edit#gid=1669621002',
                //Selector for lists injection
                ResultsTable: '.dealer-list-results',
                ResultsTemplate: '#list-template',
                SqlQuery: "select *"
            },
            Data: {
                LoadFromSource: function(googleDocsUrl, query, callback) {
                    if($(internal.Settings.ResultsTemplate).length > 0) {
                        var trTemplate = Handlebars.compile($Dom.find(internal.Settings.ResultsTemplate).html());
                        $Dom.find(internal.Settings.ResultsTable).sheetrock({
                            url: googleDocsUrl,
                            headersOff: true,
                            rowHandler: trTemplate,
                            sql: query,
                            resetStatus: false,
                            rowGroups: false,
                            userCallback: function() {
                                // This shows only the new state names so we only get one state heading
                                var classNames = "";
                                var stateNames = "";
                                $(".dealer-directory .dealer-finder-results h3").each(function() {
                                    if ($(this).attr("class") != classNames) {  
                                        var el = $(this);
                                        classNames = $(el).attr("class");
                                        stateNames = $(el).attr("name");
                                        var offset = $(el).offset().top;
                                        $(".directory-list select option").each(function() {
                                            if($(this).val() == stateNames) {
                                                $(this).val(offset);
                                            }                                          
                                        });
                                    } else {
                                        $(this).addClass('hide');
                                    }
                                });


                                $(".directory-list select").change(function() {
                                    $("html, body").animate({ scrollTop: $(this).val()}, 1000);
                                });
                           }
                        });
                    }
                }                
            },
        },
        api = {
            Init: function() {
                //Run function to call in the sheetrock code
                internal.Data.LoadFromSource(internal.Settings.GoogleDocsUrl, internal.Settings.SqlQuery);
            }
        };
        return api;
    }(jQuery, jQuery('html'))),

    DealerFinderWidget: (function($, $Dom, undef) {
        var internal = {
                Settings: {
                    GoogleDocsUrl: 'https://docs.google.com/spreadsheets/d/1sKlZvF4Ub6wd96G12lgONLNNKrCV2gWcoXnHLn_7L-I/edit?pli=1#gid=1669621002',
                    DealerBarActionPoints: '.dealer-finder form input, .dealer-finder form .cta',
                    DealerWrapper: '.dealer-finder.search',
                    DearlerBarInput: '.dealer-finder form input',
                    DealerBarButton: '.dealer-finder form .cta',
                    DealerInfoMessage: '.dealer-finder form .message',
                    DealerResults: '.dealer-finder-results',
                    ResultsTable: '#supplier-results',
                    Results: '#supplier-results tr',
                    ResultsTemplate: '#tr-template',
                    Messages: '.dealer-finder-results > p',
                    NoResultsMessage: '.dealer-finder-results > .no-result',
                    CurrentDealer: '.current-local-dealer',
                    SingleResultMessage: '.dealer-finder-results > .single',
                    MultiResultMessage: '.dealer-finder-results > .multiple',
                    MultiResultMessagePlaceholder: 'There are <b>$$count$$ dealers</b> in your area',
                    MultiResultMessageCountPlaceholder: '$$count$$',
                    HideComponentClass: 'hidden',
                    LoadingClass: 'loading',
                    SqlQuery: "select * where K contains '$$zipcodeprefix$$' "
                },
                Events: {
                    OnUserInteraction: function(evt) {
                        evt.preventDefault();
                        $Dom.find(internal.Settings.DealerInfoMessage).addClass(internal.Settings.HideComponentClass);
                        $Dom.find(internal.Settings.DealerBarActionPoints).off('click', internal.Events.OnUserInteraction);
                    },
                    OnInputKeyDown: function(evt) {
                        if (evt.which === 13) {
                            $Dom.find(internal.Settings.DealerBarButton).trigger('click');
                            evt.preventDefault();
                            return false;
                        }
                        return true;
                    },
                    OnInputKeyup: function(evt) {
                        if ($(internal.Settings.DearlerBarInput).val().length == 3 && evt.which != 13) {
                            $Dom.find(internal.Settings.DealerBarButton).trigger('click');
                        }
                    },
                    OnDealerSearchSubmit: function(evt) {
                        var zipCodePrefix = $Dom.find(internal.Settings.DearlerBarInput).val();
                        $Dom.find(internal.Settings.NoResultsMessage).addClass(internal.Settings.HideComponentClass);
                        $Dom.find(internal.Settings.CurrentDealer).addClass(internal.Settings.HideComponentClass);
                        
                        //Work out if the ZIP or postcode
                        if (!jQuery.isNumeric(zipCodePrefix)) {
                            //Postcode
                            var zipCodePrefixUpper = zipCodePrefix.toUpperCase();
                            var zipCodePrefix = zipCodePrefixUpper.substring(0,1);
                        } else {
                            //ZIP
                            if (zipCodePrefix.length < 2) {
                                var zipCodePrefix = "False";
                            } else {
                                var zipCodePrefix = zipCodePrefix.substring(0,3);
                            }
                        }



                        var query = (zipCodePrefix !== '') ? internal.Settings.SqlQuery.replace('$$zipcodeprefix$$', zipCodePrefix.replace(/\s+/g, '')) : undef;
                        evt.preventDefault();

                        $Dom.find(internal.Settings.Results).remove();
                        
                        $Dom.find(internal.Settings.DealerWrapper).addClass(internal.Settings.LoadingClass);
                        $Dom.find(internal.Settings.DealerResults).addClass(internal.Settings.HideComponentClass);
                        internal.Data.LoadFromSource(internal.Settings.GoogleDocsUrl, query);
                    },
                    OnDataLoad: function() {
                        $Dom.find(internal.Settings.DealerWrapper).removeClass(internal.Settings.LoadingClass);
                        $Dom.find(internal.Settings.DealerResults).removeClass(internal.Settings.HideComponentClass);
                        internal.Methods.DisplayResultMessage($Dom.find(internal.Settings.Results).length);
                    }
                },
                Data: {
                    LoadFromSource: function(googleDocsUrl, query) {
                        if($(internal.Settings.ResultsTemplate).length > 0) {
                            var trTemplate = Handlebars.compile($Dom.find(internal.Settings.ResultsTemplate).html());
                            $Dom.find(internal.Settings.ResultsTable).sheetrock({
                                url: googleDocsUrl,
                                headersOff: true,
                                rowHandler: trTemplate,
                                sql: query,
                                userCallback: internal.Events.OnDataLoad,
                                resetStatus: true
                            });
                        }
                    }
                },
                Methods: {
                    DisplayResultMessage: function(childCount) {
                        var $multiMessage = $Dom.find(internal.Settings.MultiResultMessage);

                        $Dom.find(internal.Settings.Messages).each(function() {
                            var $this = $(this);

                            if (!$this.hasClass(internal.Settings.HideComponentClass)) {
                                $this.addClass(internal.Settings.HideComponentClass);
                            }
                        });

                        switch (childCount) {
                        case 0:
                            $Dom.find(internal.Settings.NoResultsMessage).removeClass(internal.Settings.HideComponentClass);
                            break;
                        case 1:
                            $Dom.find(internal.Settings.SingleResultMessage).removeClass(internal.Settings.HideComponentClass);
                            break;
                        default:
                            $multiMessage.removeClass(internal.Settings.HideComponentClass);
                            $multiMessage.html(internal.Settings.MultiResultMessagePlaceholder);
                            $multiMessage.text($multiMessage.text().replace(internal.Settings.MultiResultMessageCountPlaceholder, childCount));
                            break;
                        }
                    }
                }
            },
            api = {
                Init: function() {
                    if ($Dom.find(internal.Settings.DealerBarActionPoints).length > 0) {
                        $Dom.find(internal.Settings.DealerBarActionPoints).on('click', internal.Events.OnUserInteraction);
                        $Dom.find(internal.Settings.DealerBarButton).on('click', internal.Events.OnDealerSearchSubmit);
                        $Dom.find(internal.Settings.DearlerBarInput).on('keydown', internal.Events.OnInputKeyDown);
                        $Dom.find(internal.Settings.DearlerBarInput).on('keyup', internal.Events.OnInputKeyup);
                    }
                }
            };
        return api;
    }(jQuery, jQuery('html'))),

    ProductCustomiser: (function($, $Dom) {
        var internal = {
                Settings: {
                    Selectors: {
                        Wrapper: '.product-customizer',
                        Options: '.product-styles .swatches li',
                        TrimOptions: '.product-styles .swatches li',
                        TrimInfo: '.product-customizer span.trim-info',
                        FabricInfo: '.product-customizer span.fabric-info',
                        DisplayImage: '.product-customizer .display-image',
                        ActiveTrim: '.product-customizer .trim-options li[data-option-group="trim"].active',
                        ActiveFabric: '.product-customizer .trim-options li[data-fabric-info].active'
                    },
                    Classes: {
                        ActiveOption: 'active'
                    },
                    Data: {
                        Attr: {
                            Group: 'data-option-group',
                            TrimInfo: 'data-trim-info',
                            FabricInfo: 'data-fabric-info',
                            TrimImageName: 'data-trim-img-component',
                            FabricImageName: 'data-fabric-img-component',
                            BaseUrl: 'data-base-url'
                        },
                        Value: {
                            Trim: 'trim'
                        }
                    },
                    Placeholder: {
                        ImageName: '$$imageName$$'
                    }
                },
                State: {
                    DefaultTrim: null,
                    DefaultFabric: null,
                    DefaultImage: null
                },
                Events: {
                    OnOptionSelection: function(evt) {
                        var $this = $(this);
                        evt.preventDefault();

                        internal.Methods.ApplyOptions($this);
                    }
                },
                Methods: {
                    SetDefaults: function() {
                        internal.State.DefaultTrim = $Dom.find(internal.Settings.Selectors.TrimInfo).text();
                        internal.State.DefaultFabric = $Dom.find(internal.Settings.Selectors.FabricInfo).text();
                        internal.State.DefaultImage = $Dom.find(internal.Settings.Selectors.DisplayImage).attr('src');
                    },
                    ApplyOptions: function($this) {
                        var attrGroup = $this.attr(internal.Settings.Data.Attr.Group),
                            hasClass = $this.hasClass(internal.Settings.Classes.ActiveOption);
                        switch (attrGroup) {
                        case internal.Settings.Data.Value.Trim:
                            $Dom.find(internal.Settings.Selectors.TrimOptions).removeClass(internal.Settings.Classes.ActiveOption);
                            if (!hasClass) {
                                $this.addClass(internal.Settings.Classes.ActiveOption);
                                hasClass = true;
                            } else {
                                hasClass = false;
                            }
                            break;
                        default:
                            $this.toggleClass(internal.Settings.Classes.ActiveOption);
                            if (!hasClass) {
                                hasClass = true;
                                $this.siblings().removeClass(internal.Settings.Classes.ActiveOption);
                            } else {
                                hasClass = false;
                            }
                            break;
                        }

                        internal.Methods.ModifyInfoBlock($this, hasClass);
                        internal.Methods.ModifyImage();
                    },
                    ModifyInfoBlock: function($this, optionSelected) {
                        if (!!$this.attr(internal.Settings.Data.Attr.TrimInfo)) {
                            if (optionSelected) {
                                $Dom.find(internal.Settings.Selectors.TrimInfo).text($this.attr(internal.Settings.Data.Attr.TrimInfo));
                            } else {
                                $Dom.find(internal.Settings.Selectors.TrimInfo).text(internal.State.DefaultTrim);
                            }
                        } else if (!!$this.attr(internal.Settings.Data.Attr.FabricInfo)) {
                            if (optionSelected) {
                                $Dom.find(internal.Settings.Selectors.FabricInfo).text($this.attr(internal.Settings.Data.Attr.FabricInfo));
                            } else {
                                $Dom.find(internal.Settings.Selectors.FabricInfo).text(internal.State.DefaultFabric);
                            }
                        }
                    },
                    ModifyImage: function() {
                        var $activeTrim = $Dom.find(internal.Settings.Selectors.ActiveTrim),
                            $activeFabric = $Dom.find(internal.Settings.Selectors.ActiveFabric),
                            imageUrl = $Dom.find(internal.Settings.Selectors.DisplayImage).attr(internal.Settings.Data.Attr.BaseUrl) + internal.Settings.Placeholder.ImageName;

                        if ($activeTrim.length > 0 && $activeFabric.length > 0) {
                            imageUrl = imageUrl.replace(internal.Settings.Placeholder.ImageName, $activeTrim.attr(internal.Settings.Data.Attr.TrimImageName) + '-' + $activeFabric.attr(internal.Settings.Data.Attr.FabricImageName) + '.jpg');
                        } else if ($activeTrim.length > 0) {
                            imageUrl = imageUrl.replace(internal.Settings.Placeholder.ImageName, $activeTrim.attr(internal.Settings.Data.Attr.TrimImageName) + '.jpg');
                        } else if ($activeFabric.length > 0) {
                            imageUrl = imageUrl.replace(internal.Settings.Placeholder.ImageName, $activeFabric.attr(internal.Settings.Data.Attr.FabricImageName));
                        } else {
                            imageUrl = internal.State.DefaultImage;
                        }

                        $Dom.find(internal.Settings.Selectors.DisplayImage).attr('src', imageUrl);
                    }
                }
            },
            api = {
                Init: function() {
                    internal.Methods.SetDefaults();
                    $Dom.find(internal.Settings.Selectors.Options).on('click', internal.Events.OnOptionSelection);
                }
            };

        return api;
    }(jQuery, jQuery('html'))),

};

/*
    Main execution entry point
*/
$(document).ready(function ()
{
    Stannah.UI.Init();
    Stannah.Plugins.Init();
});