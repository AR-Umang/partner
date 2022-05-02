if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}

$.AdminBSB = {};
$.AdminBSB.options = {
    colors: {
        red: "#F44336",
        pink: "#E91E63",
        purple: "#9C27B0",
        deepPurple: "#673AB7",
        indigo: "#3F51B5",
        blue: "#2196F3",
        lightBlue: "#03A9F4",
        cyan: "#00BCD4",
        teal: "#009688",
        green: "#4CAF50",
        lightGreen: "#8BC34A",
        lime: "#CDDC39",
        yellow: "#ffe821",
        amber: "#FFC107",
        orange: "#FF9800",
        deepOrange: "#FF5722",
        brown: "#795548",
        grey: "#9E9E9E",
        blueGrey: "#607D8B",
        black: "#000000",
        white: "#ffffff",
    },
    dropdownMenu: {
        effectIn: "fadeIn",
        effectOut: "fadeOut",
    },
};

/* Input - Function ========================================================================================================
 *  You can manage the inputs(also textareas) with name of class 'form-control'
 *
 */
$.AdminBSB.input = {
    activate: function ($parentSelector) {
        $parentSelector = $parentSelector || $("body");

        //On focus event
        $parentSelector.find(".form-control").focus(function () {
            $(this).closest(".form-line").addClass("focused");
        });

        //On focusout event
        $parentSelector.find(".form-control").focusout(function () {
            var $this = $(this);
            if ($this.parents(".form-group").hasClass("form-float")) {
                if ($this.val() == "") {
                    $this.parents(".form-line").removeClass("focused");
                }
            } else {
                $this.parents(".form-line").removeClass("focused");
            }
        });

        //On label click
        $parentSelector.on(
            "click",
            ".form-float .form-line .form-label",
            function () {
                $(this).parent().find("input").focus();
            }
        );

        //Not blank form
        $parentSelector.find(".form-control").each(function () {
            if ($(this).val() !== "") {
                $(this).parents(".form-line").addClass("focused");
            }
        });
    },
};
//==========================================================================================================================

/* Form - Select - Function ================================================================================================
 *  You can manage the 'select' of form elements
 *
 */
$.AdminBSB.select = {
    activate: function () {
        if ($.fn.selectpicker) {
            $("select:not(.ms)").selectpicker({
                dropupAuto: true
            });
        }
    },
};
//==========================================================================================================================

/* DropdownMenu - Function =================================================================================================
 *  You can manage the dropdown menu
 *
 */

$.AdminBSB.dropdownMenu = {
    activate: function () {
        var _this = this;

        $(".dropdown, .dropup, .btn-group").on({
            "show.bs.dropdown": function () {
                var dropdown = _this.dropdownEffect(this);
                _this.dropdownEffectStart(dropdown, dropdown.effectIn);
            },
            "shown.bs.dropdown": function () {
                var dropdown = _this.dropdownEffect(this);
                if (dropdown.effectIn && dropdown.effectOut) {
                    _this.dropdownEffectEnd(dropdown, function () { });
                }
            },
            "hide.bs.dropdown": function (e) {
                var dropdown = _this.dropdownEffect(this);
                if (dropdown.effectOut) {
                    e.preventDefault();
                    _this.dropdownEffectStart(dropdown, dropdown.effectOut);
                    _this.dropdownEffectEnd(dropdown, function () {
                        dropdown.dropdown.removeClass("open");
                    });
                }
            },
        });

        //Set Waves
        Waves.attach(".dropdown-menu li a", ["waves-block"]);
        Waves.init();
    },
    dropdownEffect: function (target) {
        var effectIn = $.AdminBSB.options.dropdownMenu.effectIn,
            effectOut = $.AdminBSB.options.dropdownMenu.effectOut;
        var dropdown = $(target),
            dropdownMenu = $(".dropdown-menu", target);

        if (dropdown.length > 0) {
            var udEffectIn = dropdown.data("effect-in");
            var udEffectOut = dropdown.data("effect-out");
            if (udEffectIn !== undefined) {
                effectIn = udEffectIn;
            }
            if (udEffectOut !== undefined) {
                effectOut = udEffectOut;
            }
        }

        return {
            target: target,
            dropdown: dropdown,
            dropdownMenu: dropdownMenu,
            effectIn: effectIn,
            effectOut: effectOut,
        };
    },
    dropdownEffectStart: function (data, effectToStart) {
        if (effectToStart) {
            data.dropdown.addClass("dropdown-animating");
            data.dropdownMenu.addClass("animated dropdown-animated");
            data.dropdownMenu.addClass(effectToStart);
        }
    },
    dropdownEffectEnd: function (data, callback) {
        var animationEnd =
            "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
        data.dropdown.one(animationEnd, function () {
            data.dropdown.removeClass("dropdown-animating");
            data.dropdownMenu.removeClass("animated dropdown-animated");
            data.dropdownMenu.removeClass(data.effectIn);
            data.dropdownMenu.removeClass(data.effectOut);

            if (typeof callback == "function") {
                callback();
            }
        });
    },
};
//==========================================================================================================================

/* Browser - Function ======================================================================================================
 *  You can manage browser
 *
 */
var edge = "Microsoft Edge";
var ie10 = "Internet Explorer 10";
var ie11 = "Internet Explorer 11";
var opera = "Opera";
var firefox = "Mozilla Firefox";
var chrome = "Google Chrome";
var safari = "Safari";

$.AdminBSB.browser = {
    activate: function () {
        var _this = this;
        var className = _this.getClassName();

        if (className !== "") $("html").addClass(_this.getClassName());
    },
    getBrowser: function () {
        var userAgent = navigator.userAgent.toLowerCase();

        if (/edge/i.test(userAgent)) {
            return edge;
        } else if (/rv:11/i.test(userAgent)) {
            return ie11;
        } else if (/msie 10/i.test(userAgent)) {
            return ie10;
        } else if (/opr/i.test(userAgent)) {
            return opera;
        } else if (/chrome/i.test(userAgent)) {
            return chrome;
        } else if (/firefox/i.test(userAgent)) {
            return firefox;
        } else if (!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/)) {
            return safari;
        }

        return undefined;
    },
    getClassName: function () {
        var browser = this.getBrowser();

        if (browser === edge) {
            return "edge";
        } else if (browser === ie11) {
            return "ie11";
        } else if (browser === ie10) {
            return "ie10";
        } else if (browser === opera) {
            return "opera";
        } else if (browser === chrome) {
            return "chrome";
        } else if (browser === firefox) {
            return "firefox";
        } else if (browser === safari) {
            return "safari";
        } else {
            return "";
        }
    },
};
//==========================================================================================================================

$(function () {
    $.AdminBSB.browser.activate();
    $.AdminBSB.dropdownMenu.activate();
    $.AdminBSB.input.activate();
    // $.AdminBSB.select.activate();
});
//==========================================================================================================================

/* Helper Functions ======================================================================================================
 *
 */

function getLoggedInPartner() {
    var user;
    try {
        user = JSON.parse(localStorage.getItem("partner"));
    } catch (e) {
        // console.log(e.text);
    }
    return user;
}

function getStoredData(dataKey) {
    var data;
    try {
        data = JSON.parse(localStorage.getItem(dataKey));
    } catch (e) {
        // console.log(e.text);
    }
    return data;
}

function saveFileToLocalStorage(dataKey, file, input) {
    if (!file) return;
    var filesize = (file.size / (1024 * 1024)).toFixed(4); //filesize in MB
    if (filesize > 2) {
        swal("Attached file size cannot be more than 2MB");
        if (input)
            $(input)
                .closest(".form-element")
                .find(".form-element-inputfile-reset")
                .trigger("click");
        return;
    }

    fileToBase64(file)
        .then(function (data) {
            var fileData = {
                data: data,
                name: file.name,
                type: file.type,
            };
            localStorage.setItem(dataKey, JSON.stringify(fileData));
        })
        .catch(function (error) {
            // console.log("FILE_BASE_64_CONVERSION_ERROR", error);
        });
}

function fileToBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = (error) => reject(error);
    });
}

function isValidEmail(email) {
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email);
}

function isValidPhoneNumber(phone) {
    return /^[2-9]\d{9}$/.test(phone);
}

function isValidUSPhoneNumber(phone) {
    return /^((\([0-9]{3}\))|[0-9]{3})[\s\-][\0-9]{3}[\s\-][0-9]{4}$/.test(phone)
}

function isValidSSN(ssn) {
    return /^[0-9]\d{2}\-[0-9]\d{1}\-[0-9]\d{3}$/.test(ssn);
}

function isValidEIN(ein) {
    return /^([07][1-7]|1[0-6]|2[0-7]|[35][0-9]|[468][0-8]|9[0-589])-?\d{7}$/.test(ein)
}

function padZero(n, width, z) {
    z = z || "0";
    n = n + "";
    return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function hexToRgb(hexCode) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb =
        "rgb(" +
        parseInt(matches[1], 16) +
        "," +
        parseInt(matches[2], 16) +
        "," +
        parseInt(matches[3], 16) +
        ")";
    return rgb;
}

function hexToRgba(hexCode, opacity) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb =
        "rgba(" +
        parseInt(matches[1], 16) +
        "," +
        parseInt(matches[2], 16) +
        "," +
        parseInt(matches[3], 16) +
        "," +
        opacity +
        ")";
    return rgb;
}

function showSuccessNotification(message) {
    if (message) {
        showNotification("alert-success", message, "top", "right", "", "");
    }
}

function showErrorNotification(message) {
    showNotification(
        "alert-danger",
        message ? message : "Something went wrong, please try again!",
        "top",
        "right",
        "",
        ""
    );
}

function showWarningNotification(message) {
    showNotification(
        "alert-warning",
        message ? message : "Something went wrong, please try again!",
        "top",
        "right",
        "",
        ""
    );
}

function showNotification(
    colorName,
    text,
    placementFrom,
    placementAlign,
    animateEnter,
    animateExit
) {
    if (colorName === null || colorName === "") {
        colorName = "bg-black";
    }
    if (text === null || text === "") {
        text = "Turning standard Bootstrap alerts";
    }
    if (animateEnter === null || animateEnter === "") {
        animateEnter = "animated fadeInDown";
    }
    if (animateExit === null || animateExit === "") {
        animateExit = "animated fadeOutUp";
    }
    var allowDismiss = true;

    $.notify({
        message: text,
    }, {
        type: colorName,
        allow_dismiss: allowDismiss,
        newest_on_top: true,
        timer: 1000,
        placement: {
            from: placementFrom,
            align: placementAlign,
        },
        animate: {
            enter: animateEnter,
            exit: animateExit,
        },
        template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' +
            (allowDismiss ? "p-r-35" : "") +
            '" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            "</div>" +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            "</div>",
    });
}
//==========================================================================================================================

/* Document Scripts ======================================================================================================
 *
 */

$(document).ready(function () {
    var loggedInUser = getLoggedInPartner();

    $(".page-loader-wrapper").hide();
    $(document).on("click", function (e) {
        $(".settings-dropdown").hide();
    });

    if (loggedInUser && loggedInUser.role) {
        $(document).on("click", ".logo", function (e) {
            location.href = `${baseURL}${loggedInUser.role}`;
        });
    }

    $('.layout-auth.signup').height($('#register-form').height() + 300)
    // console.log('Signup page height = ', $('#register-form').height() + 300)

    // $('#credit-report-iframe').load(function () {
    //     // alert("the iframe has been loaded");
    //     let iframeDocument = $(this)[0].contentWindow.document
    //     // console.log(iframeDocument)
    //     // $(iframeDocument).on('click', 'downloadpdf', function (e) {
    //     ////      console.log('Report pdf download link clicked')
    //     // })
    // });

    /* Sidebar Menu */
    $(".desktop-toggle-menu").on("click", function (e) {
        $(".sidebar-menu").toggleClass("expanded");
    });
    $(".mobile-toggle-menu").on("click", function (e) {
        $(".page-sidebar").toggleClass("sidebar-opened");
    });
    $(".btn-close-sidebar").on("click", function (e) {
        $(".sidebar-menu").removeClass("expanded");
    });
    $(".sidebar-menu li a").on("click", function (e) {
        $(".sidebar-menu").removeClass("expanded");
        var pageLocation = $(this).attr("href");
        setTimeout(function (e) {
            location.href = pageLocation;
        }, 300);
    });

    /* Header Dropdown Menu */
    $(".nav-item-user").on("click", function (e) {
        $(this).find(".dropdown-menu").show();
    });
    $(".nav-item-user .dropdown-menu li a").on("click", function (e) {
        var pageLocation = $(this).attr("href");
        location.href = pageLocation;
    });

    /* Button Actions */
    $(document).on("click", "#signup-button", function (e) {
        location.href = `${baseURL}app/register`;
    });
    $(document).on("click", "#login-button", function (e) {
        location.href = `${baseURL}app/login`;
    });
    $("#back-button").on("click", function (e) {
        e.preventDefault();
        window.history.back();
    });
    $(document).on("click", "#contractor-get-started-button", function (e) {
        window.open(`${baseURL}user/kaped_independent_contractor`);
    });

    /* Form fields events */
    $(".phone, .fax").on("keypress", function (e) {
        const key = e.which || e.keyCode;
        if (!((key >= 48 && key <= 57) || key == 45)) {
            e.preventDefault();
        }
    });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Sign-In form submit
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#sign_in").submit(function (e) {
        e.preventDefault();
        login(this);
    });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * View User Details Event
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $(document).on("click", ".button-view-user", function (e) {
        e.preventDefault();
        var userId = $(this).closest("tr").attr("id");
        location.href = `${baseURL}admin/user/${userId}`;
    });


    $(document).on("click", "#edit-profile-button", function (e) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        location.href = `${baseURL}${loggedInUser.role}/edit_profile`;
    });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * New user form init
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    // $("#dob").datepicker({
    //     autoclose: true,
    //     format: "dd/mm/yyyy",
    //     endDate: moment().add(-18, "year").toDate(),
    // });
    // $("#business-start-date").datepicker({
    //     autoclose: true,
    //     format: "dd/mm/yyyy",
    // });
    $("#phone,#postcode").on("keypress", function (e) {
        const key = e.which || e.keyCode;
        if (!(key >= 48 && key <= 57)) {
            e.preventDefault();
        }
    });
    $("#country").val("United States");
    // $("#ssn").inputmask();

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * New user form submit
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#register-user-button").on("click", function (e) {
        e.preventDefault();
        submitRegisterUserForm(e, $("register-form"));
    });
    $("register-form").submit(function (e) {
        e.preventDefault();
        submitRegisterUserForm(e, this);
    });

    function submitRegisterUserForm(e, formElement) {
        e.preventDefault();

        var confirmedPassword = $("#confirm-password").val();
        var data = {
            firstName: $("#first-name").val(),
            lastName: $("#last-name").val(),
            emailAddress: $("#email").val(),
            phoneNumber: $("#phone").val(),
            DOB: $("#dob").val(),
            SSN: $("#ssn").val(),
            homeAddress: $("#address").val(),
            userRole: "user",
            city: $("#city").val(),
            state: $("#state").val(),
            postcode: $("#postcode").val(),
            country: "US",
            password: $("#password").val(),
        };

        var error = [];
        if (!data.firstName) error.push("<li>First name is required</l1>");
        if (!data.lastName) error.push("<li>Last name is required</l1>");
        if (!data.emailAddress) error.push("<li>Email address is required</l1>");
        else if (!isValidEmail(data.emailAddress)) {
            error.push("<li>Email address is invalid</l1>");
        }
        if (!data.phoneNumber) error.push("<li>Phone number is required</l1>");
        else if (!isValidPhoneNumber(data.phoneNumber)) {
            error.push("<li>Phone number is invalid</l1>");
        }
        if (!data.DOB) error.push("<li>Date of birth is required</l1>");
        if (!data.SSN) error.push("<li>SSN is required</l1>");
        else if (!isValidSSN(data.SSN)) {
            error.push(
                "<li>SSN is invalid, should be in format e.g '111-11-111'</l1>"
            );
        }
        if (!data.homeAddress) error.push("<li>Home address is required</l1>");
        if (!data.city) error.push("<li>City is required</l1>");
        if (!data.state) error.push("<li>State is required</l1>");
        if (!data.postcode) error.push("<li>Post Code is required</l1>");
        if (!data.password) error.push("<li>Password is required</l1>");
        else if (data.password !== confirmedPassword) {
            error.push("<li>Password and confirm password not matched</l1>");
        }

        if (error.length > 0) {
            return swal({
                title: "Validation Error",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        if (!$("#terms-and-condition").prop("checked")) {
            return swal({
                title: "Validation Error",
                text: `'Please check terms & conditions'`,
                html: true,
            });
        }

        // console.log("Form Data", data);

        $(".page-loader-wrapper").show();
        createNewUser(formElement, data);
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Edit user action
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $(document).on("click", ".button-edit-user", function (e) {
        e.preventDefault();
        var userId = $(this).closest("tr").attr("id");
        location.href = `${baseURL}admin/edit_user/${userId}`
    });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Edit user form submit
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#edit-user-form .submit-button").on("click", function (e) {
        e.preventDefault();
        $("#edit-user-form").trigger("submit");
    });
    $("#edit-user-form-submit-button").on("click", function (e) {
        e.preventDefault();
        $("#edit-user-form").trigger("submit");
    });
    $("#edit-user-form").submit(function (e) {
        e.preventDefault();
        submitUpdateUserDetailsForm(e, this);
    });

    function submitUpdateUserDetailsForm(e, formElement) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        var userId = $.AdminBSB.userToEdit.ID
        if (!userId) {
            return showErrorNotification()
        }

        var data = {
            firstName: $("#first-name").val(),
            lastName: $("#last-name").val(),
            emailAddress: $("#email").val(),
            phoneNumber: $("#phone").val(),
            DOB: $("#dob").val(),
            SSN: $("#ssn").val(),
            homeAddress: $("#address").val(),
            userRole: "user",
            city: $("#city").val(),
            state: $("#user-state").val(),
            postcode: $("#postcode").val(),
            licenseNumber: $("#license-number").val(),
            businessName: $('#business-name').val(),
            businessType: $('#business-type').val(),
            businessAddress: $('#business-address').val(),
            businessCity: $('#business-city').val(),
            businessState: $('#business-state').val(),
            businessZip: $('#business-zip').val(),
            einNumber: $('#ein-number').val(),
            foundedDate: $('#founded-date').val(),
            bankName: $('#bank-name').val(),
            bankAccountNumber: $('#bank-account-number').val(),
            nameOnBankAccount: $('#name-of-account').val(),
            routingNumber: $('#routing-number').val()
        };

        var error = [];
        if (!data.firstName) error.push("<li>First name is required</l1>");
        if (!data.lastName) error.push("<li>Last name is required</l1>");
        if (!data.emailAddress) error.push("<li>Email address is required</l1>");
        if (!isValidEmail(data.emailAddress)) {
            error.push("<li>Email address is invalid</l1>");
        }
        if (!data.phoneNumber) error.push("<li>Phone number is required</l1>");
        else if (!isValidPhoneNumber(data.phoneNumber)) {
            error.push("<li>Phone number is invalid</l1>");
        }
        if (!data.DOB) error.push("<li>Date of birth is required</l1>");
        if (!data.SSN) error.push("<li>SSN is required</l1>");
        else if (!isValidSSN(data.SSN)) {
            error.push(
                "<li>SSN is invalid, should be in format e.g '111-11-111'</l1>"
            );
        }
        if (!data.homeAddress) error.push("<li>Home address is required</l1>");
        if (!data.city) error.push("<li>City is required</l1>");
        if (!data.state) error.push("<li>State is required</l1>");
        if (!data.postcode) error.push("<li>Post Code is required</l1>");
        if (!data.licenseNumber) error.push("<li>Driver's license number is required</l1>");
        // if (!data.businessName) error.push("<li>Business name is required</l1>");
        // if (!data.businessType) error.push("<li>Business type is required</l1>");
        // if (!data.businessAddress) error.push("<li>Business address is required</l1>");
        // if (!data.businessCity) error.push("<li>Business city is required</l1>");
        // if (!data.businessState) error.push("<li>Business state is required</l1>");
        // if (!data.businessZip) error.push("<li>Business zip code is required</l1>");
        // if (!data.einNumber) error.push("<li>EIN is required</l1>");
        // else if (isValidEIN(data.einNumber)) error.push("<li>EIN is invalid</l1>");
        // if (!data.foundedDate) error.push("<li>Founded date is required</l1>");
        // if (!data.bankName) error.push("<li>Bank name is required</l1>");
        // if (!data.bankAccountNumber) error.push("<li>Bank account number is required</l1>");
        // if (!data.nameOnBankAccount) error.push("<li>Name on bank account is required</l1>");
        // if (!data.routingNumber) error.push("<li>Routing number is required</l1>");


        if (error.length > 0) {
            return swal({
                title: "Please fill all required fields",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        // console.log("UPDATED_DATA", data);

        $(".page-loader-wrapper").show();
        updateUser(userId, data);

    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Capital Application form fields init
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    var selectedStateCodes = {}
    $('.other-owner-details-row:first').find('.other-owner-state').on('change', function (e) {
        selectedStateCodes[1] = e.target.value
    })
    // $('.other-owner-details-row:first').find('.other-owner-dob').datepicker({
    //     autoclose: true,
    //     format: "mm/dd/yyyy",
    //     endDate: moment().add(-18, "year").toDate(),
    // });

    $("#amount-needed,#employer-id").on("keypress", function (e) {
        const key = e.which || e.keyCode;
        if (!(key >= 48 && key <= 57)) {
            e.preventDefault();
        }
    });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Capital Application form submit
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#business-credit-application-submit-button").on("click", function (e) {
        e.preventDefault();
        $("#business-credit-application-form").trigger("submit");
    });
    $("#business-credit-application-form .submit-button").on("click", function (e) {
        e.preventDefault();
        $("#business-credit-application-form").trigger("submit");
    });
    $("#business-credit-application-form").submit(function (e) {
        e.preventDefault();
        submitBusinessCreditApplicationForm(e, this);
    });

    function submitBusinessCreditApplicationForm(e, formElement) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        var data = {
            sandbox: false,
            uuid: `capital_application_${loggedInUser.user_id}`,
            dba_name: $("#business-name").val(),
            first_name: $("#first-name").val(),
            last_name: $("#last-name").val(),
            phone_number: $("#phone").val(),
            email_address: $("#email").val(),
            // owner_date_of_birth: !!$("#dob").val() ? moment($("#dob").val()).format("MM/DD/YYYY") : "",
            // owner_home_address: $("#home-address").val(),
            // owner_city: $("#city").val(),
            // owner_state: $("#state").val(),
            //owner_zip: $("#postcode").val(),
            // owner_ssn: $("#ssn").val(),
            //  use_of_funds: $("#use-of-funds").val(),
            //  amount_needed: $("#amount-needed").val(),
            terms_of_service: $("#terms-of-service").prop('checked'),
            business_entity_type: $("#business-type").val(),
            business_start_date: $("#business-start-date").val(),
            business_address: $("#business-address").val(),
            business_city: $("#city").val(),
            business_state: $("#state").val(),
            business_zip: $("#zip").val(),
            // employer_identification_number: $("#employer-id").val(),
            number_of_owners: 1
        };

        // var error = [];
        // if (!data.first_name) error.push("<li>First Name</l1>");
        // if (!data.last_name) error.push("<li>Last Name</l1>");
        // if (!data.email_address) error.push("<li>Email Address</l1>");
        // if (!data.phone_number) error.push("<li>Phone Number</l1>");
        // if (!data.owner_date_of_birth) error.push("<li>Date of birth</l1>");
        // if (!data.owner_ssn) error.push("<li>Social Security Number</l1>");
        // if (!data.owner_home_address) error.push("<li>Home Address</l1>");
        // if (!data.owner_city) error.push("<li>Owner City</l1>");
        // if (!data.owner_state) error.push("<li>Owner State</l1>");
        // if (!data.owner_zip) error.push("<li>Owner ZIP</l1>");
        // if (!data.dba_name) error.push("<li>Business Name</l1>");
        // if (!data.business_entity_type) error.push("<li>Business Type</l1>");
        // if (!data.business_address) error.push("<li>Business Address</l1>");
        // if (!data.business_city) error.push("<li>Business City</l1>");
        // if (!data.business_state) error.push("<li>Business State</l1>");
        // if (!data.business_zip) error.push("<li>Business ZIP</l1>");
        // if (!data.use_of_funds) error.push("<li>Use of funds</l1>");
        // if (!data.amount_needed) error.push("<li>Amount Needed</l1>");
        // if (!data.employer_identification_number)
        //     error.push("<li>Employer Identification Number</l1>");
        // if (!data.business_start_date) error.push("<li>Business Start Date</l1>");

        // if (error.length > 0) {
        //     return swal({
        //         title: "Please fill all required fields",
        //         text: `<ul>${error.join("\n")}</ul>`,
        //         html: true,
        //     });
        // }

        // var ownerNum;
        // for (ownerNum = 0; ownerNum < otherOwners.length; ownerNum++) {
        //     var owner = otherOwners[ownerNum]
        //     if (!owner.first_name) error.push(`<li>First Name</l1>`);
        //     if (!owner.last_name) error.push(`<li>Last Name</l1>`);
        //     if (!owner.city) error.push(`<li>City</l1>`);
        //     if (!owner.state) error.push(`<li>State</l1>`);
        //     if (!owner.zip) error.push(`<li>Zip</l1>`);
        //     if (!owner.ssn) error.push(`<li>SSN</l1>`);
        //     if (!owner.dob) error.push(`<li>DOB</l1>`);
        //     if (!owner.ownership) error.push(`<li>Ownership</l1>`);

        //     if (error.length > 0) break
        // }

        // if (error.length > 0) {
        //     return swal({
        //         title: `Please fill other owners #${ownerNum + 1} required fields`,
        //         text: `<ul>${error.join("\n")}</ul>`,
        //         html: true,
        //     });
        // }

        //      console.log("UPDATED_DATA", data);

        // $(".page-loader-wrapper").show();
        // createCapitalApplication(formElement, data);

    }


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Capital Application form fields init
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    var selectedStateCodes = {}
    $('.other-owner-details-row:first').find('.other-owner-state').on('change', function (e) {
        selectedStateCodes[1] = e.target.value
    })
    // $('.other-owner-details-row:first').find('.other-owner-dob').datepicker({
    //     autoclose: true,
    //     format: "mm/dd/yyyy",
    //     endDate: moment().add(-18, "year").toDate(),
    // });
    $("#btn-clone-other-owner").on("click", function (e) {
        e.preventDefault();

        var formId = $(".other-owner-details-row").length + 1
        var clonnedRow = $(".other-owner-details-row:first").clone();
        clonnedRow.find(".other-owner-first-name").attr("name", "other-owner-first-name[]").val("");
        clonnedRow.find(".other-owner-last-name").attr("name", "other-owner-last-name[]").val("");
        clonnedRow.find(".other-owner-ssn").attr("name", "other-owner-ssn[]").val("");
        clonnedRow.find(".other-owner-ownership").attr("name", "other-owner-ownership[]").val("");
        clonnedRow.find(".other-owner-address").attr("name", "other-owner-address[]").val("");
        clonnedRow.find(".other-owner-city").attr("name", "other-owner-city[]").val("");
        clonnedRow.find(".other-owner-zip").attr("name", "other-owner-zip[]").val("");

        var dobPicker = clonnedRow.find(".other-owner-dob")
        dobPicker.attr("name", "other-owner-dob[]").val("")
        dobPicker.attr("id", `other-owner-dob${formId}`)
        // dobPicker.datepicker({
        //     autoclose: true,
        //     format: "mm/dd/yyyy",
        //     endDate: moment().add(-18, "year").toDate(),
        // });

        var select = clonnedRow.find(".other-owner-state");
        select.attr("id", `other-owner-state${formId}`)
        select.find('button').remove()
        select.selectpicker()
        select.on('change', function (e) {
            selectedStateCodes[formId] = e.target.value
        })

        clonnedRow.insertAfter(".other-owner-details-row:last");
        attachRemoveCloneButton(clonnedRow);
    });

    function attachRemoveCloneButton(clonnedElement) {
        clonnedElement.append(
            '<div class="clone-card-footer"><button class="btn bg-theme-red waves-effect btn-delete-clone-card btn-delete-this-owner">Remove This Owner</button></div>'
        );
        clonnedElement.find(".btn-delete-clone-card").on("click", function (e) {
            $(clonnedElement).remove();
        });
    }
    $("#amount-needed,#employer-id").on("keypress", function (e) {
        const key = e.which || e.keyCode;
        if (!(key >= 48 && key <= 57)) {
            e.preventDefault();
        }
    });
    $(document).on("click", ".btn-delete-clone-card", function (e) {
        $(this).closest(".other-owner-details-row").remove();
    });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Capital Application form submit
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#apply-for-capital-submit-button").on("click", function (e) {
        e.preventDefault();
        $("#apply-for-capital-form").trigger("submit");
    });
    $("#apply-for-capital-form .submit-button").on("click", function (e) {
        e.preventDefault();
        $("#apply-for-capital-form").trigger("submit");
    });
    $("#apply-for-capital-form").submit(function (e) {
        e.preventDefault();
        submitCapitalApplicationForm(e, this);
    });

    function submitCapitalApplicationForm(e, formElement) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        var otherOwners = []
        $(".other-owner-details-row").each((idx, owner) => {
            otherOwners.push({
                "first_name": $(owner).find(".other-owner-first-name").val(),
                "last_name": $(owner).find(".other-owner-last-name").val(),
                "address": $(owner).find(".other-owner-address").val(),
                "city": $(owner).find(".other-owner-city").val(),
                "state": selectedStateCodes[idx + 1],
                "zip": $(owner).find(".other-owner-zip").val(),
                "ssn": $(owner).find(".other-owner-ssn").val(),
                "dob": $(owner).find(".other-owner-dob").val(),
                "ownership": $(owner).find(".other-owner-ownership").val(),
            })
        });
        //      console.log('OTHER_OWNERS', otherOwners)

        var data = {
            sandbox: false,
            uuid: `capital_application_${loggedInUser.user_id}`,
            dba_name: $("#business-name").val(),
            first_name: $("#first-name").val(),
            last_name: $("#last-name").val(),
            phone_number: $("#phone").val(),
            email_address: $("#email").val(),
            owner_date_of_birth: !!$("#dob").val() ? moment($("#dob").val()).format("MM/DD/YYYY") : "",
            owner_home_address: $("#home-address").val(),
            owner_city: $("#city").val(),
            owner_state: $("#state").val(),
            owner_zip: $("#postcode").val(),
            owner_ssn: $("#ssn").val(),
            use_of_funds: $("#use-of-funds").val(),
            amount_needed: $("#amount-needed").val(),
            business_entity_type: $("#business-type").val(),
            business_start_date: $("#business-start-date").val(),
            business_address: $("#business-address").val(),
            business_city: $("#business-city").val(),
            business_state: $("#business-state").val(),
            business_zip: $("#business-postcode").val(),
            employer_identification_number: $("#employer-id").val(),
            number_of_owners: 1,
            other_owners: otherOwners
        };

        var error = [];
        if (!data.first_name) error.push("<li>First Name</l1>");
        if (!data.last_name) error.push("<li>Last Name</l1>");
        if (!data.email_address) error.push("<li>Email Address</l1>");
        if (!data.phone_number) error.push("<li>Phone Number</l1>");
        if (!data.owner_date_of_birth) error.push("<li>Date of birth</l1>");
        if (!data.owner_ssn) error.push("<li>Social Security Number</l1>");
        if (!data.owner_home_address) error.push("<li>Home Address</l1>");
        if (!data.owner_city) error.push("<li>Owner City</l1>");
        if (!data.owner_state) error.push("<li>Owner State</l1>");
        if (!data.owner_zip) error.push("<li>Owner ZIP</l1>");
        if (!data.dba_name) error.push("<li>Business Name</l1>");
        if (!data.business_entity_type) error.push("<li>Business Type</l1>");
        if (!data.business_address) error.push("<li>Business Address</l1>");
        if (!data.business_city) error.push("<li>Business City</l1>");
        if (!data.business_state) error.push("<li>Business State</l1>");
        if (!data.business_zip) error.push("<li>Business ZIP</l1>");
        if (!data.use_of_funds) error.push("<li>Use of funds</l1>");
        if (!data.amount_needed) error.push("<li>Amount Needed</l1>");
        if (!data.employer_identification_number)
            error.push("<li>Employer Identification Number</l1>");
        if (!data.business_start_date) error.push("<li>Business Start Date</l1>");

        if (error.length > 0) {
            return swal({
                title: "Please fill all required fields",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        var ownerNum;
        for (ownerNum = 0; ownerNum < otherOwners.length; ownerNum++) {
            var owner = otherOwners[ownerNum]
            if (!owner.first_name) error.push(`<li>First Name</l1>`);
            if (!owner.last_name) error.push(`<li>Last Name</l1>`);
            if (!owner.city) error.push(`<li>City</l1>`);
            if (!owner.state) error.push(`<li>State</l1>`);
            if (!owner.zip) error.push(`<li>Zip</l1>`);
            if (!owner.ssn) error.push(`<li>SSN</l1>`);
            if (!owner.dob) error.push(`<li>DOB</l1>`);
            if (!owner.ownership) error.push(`<li>Ownership</l1>`);

            if (error.length > 0) break
        }

        if (error.length > 0) {
            return swal({
                title: `Please fill other owners #${ownerNum + 1} required fields`,
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        //      console.log("UPDATED_DATA", data);

        $(".page-loader-wrapper").show();
        createCapitalApplication(formElement, data);

    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Merchant Onboarding events
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $(document).on("click", ".merchant-campaigns-table td", function (e) {
        e.preventDefault();
        let campagnId = $(this).closest("tr").attr("id");
        selectMerchantCampaign(campagnId)
    });
    $(document).on("click", "#create-maverick-application-link", function (e) {
        e.preventDefault();
        createMaverickApplication()
    });
    $(document).on("click", ".merchant-applications-table td", function (e) {
        e.preventDefault();
        let applicationId = $(this).closest("tr").attr("id");
        editMaverickApplication(applicationId)
    });
    $(document).on('click', '#goto-select-campaign-button', function (e) {
        e.preventDefault()
        location.href = `${baseURL}merchant_onboarding/select_campaign`;
    })
    $(document).on("click", "#start-maverick-onboard-button", function (e) {
        e.preventDefault();
        createMaverickApplication()
    });
    $(document).on('click', '#add-merchant-principal-link', function (e) {
        e.preventDefault()
        location.href = `${baseURL}merchant_onboarding/add_principal`;
    })
    $(document).on('click', '#save-merchant-principals-link', function (e) {
        e.preventDefault()
        saveMaverickBusinessAndPrincipalsInfo()
    })

    $(document).on('click', '#back-to-maverick-applications', function (e) {
        e.preventDefault()
        location.href = `${baseURL}merchant_onboarding`;
    })

    // $(document).on('click', '#back-to-review-campaign', function(e) {
    //     e.preventDefault()
    //     location.href = `${baseURL}merchant_onboarding/review_campaign`;
    // })
    // $(document).on('click', '#back-to-company-dba-details', function(e) {
    //     e.preventDefault()
    //     location.href = `${baseURL}merchant_onboarding/company_and_dba_details`;
    // })
    // $(document).on('click', '#back-to-business-details', function(e) {
    //     e.preventDefault()
    //     location.href = `${baseURL}merchant_onboarding/business_details`;
    // })
    // $(document).on('click', '#back-to-manage-principals', function(e) {
    //     e.preventDefault()
    //     location.href = `${baseURL}merchant_onboarding/manage_principals`;
    // })
    $(document).on('click', '#back-to-processing-details', function (e) {
        e.preventDefault()
        location.href = `${baseURL}merchant_onboarding/processing_details`;
    })


    $("#federal-tax-id, .percentage-input, .number-input").on("keypress", function (e) {
        const key = e.which || e.keyCode;
        if (!(key >= 48 && key <= 57)) {
            e.preventDefault();
        }
    });
    $(".percentage-input").on("keyup", function (e) {
        if (e.target.value > 100) {
            e.target.value = 100
        }
    });
    // $("#principal-dob").datepicker({
    //     autoclose: true,
    //     format: "mm/dd/yyyy",
    //     endDate: moment().add(-18, "year").toDate(),
    // });
    // $("#founded-date, #driver-license-expiration").datepicker({
    //     autoclose: true,
    //     format: "mm/dd/yyyy"
    // });
    $('#cb-same-as-company-details').on('change', function (e) {
        e.preventDefault();
        if ($(this).is(":checked")) {
            $("#dba-name").val($("#company-name").val()).prop('disabled', true)
            $("#dba-street-address").val($("#company-street-address").val()).prop('disabled', true)
            $("#dba-city").val($("#company-city").val()).prop('disabled', true)
            $("#dba-state").val($("#company-state").val()).selectpicker('refresh').prop('disabled', true)
            $("#dba-zip").val($("#company-zip").val()).prop('disabled', true)
        }
    })

    $('#add-attachment-button').on('click', function (e) {
        e.preventDefault()
        $('#attachment-input').trigger('click')
    })
    $('#attachment-input').change(function () {
        var file = $(this)[0].files[0];
        //      console.log(file)
        var fileId = new Date().getTime()
        var html = `<div class="file-attachment" class="attachment inline-fields">
                            <i class="material-icons calendar">attach_file</i>
                            <a href="javascript:void(0)" class="eco-file" target="_blank">${file.name}</a>
                            <i class="material-icons remove-attachment-button" data-file-id="${fileId}">close</i>
                        </div>`;
        $('#attachments').append(html)
    })

    $(document).on('click', '.remove-attachment-button', function (e) {
        var fileId = $(this).attr('data-file-id')
        $(this).closest('.file-attachment').remove()
    })

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Merchant Onboarding - Company & DBA Details Form Submit 
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#save-company-dba-details-button").on('click', function (e) {
        e.preventDefault()
        $("#company-dba-details-form").trigger("submit");
    });
    $("#company-dba-details-form").submit(function (e) {
        e.preventDefault();
        submitCompanyAndDbaDetailsForm(e, this);
    });

    function submitCompanyAndDbaDetailsForm(e, formElement) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        var data = {
            company_name: $("#company-name").val(),
            company_type: $("#company-type").val(),
            federal_tax_id: $("#company-federal-tax-id").val(),
            company_street_address: $("#company-street-address").val(),
            company_city: $("#company-city").val(),
            company_state: $("#company-state").val(),
            company_zip: $("#company-zip").val(),
            founded_date: $("#founded-date").val() ? moment($("#founded-date").val()).format("MM/DD/YYYY") : "",
            dba_same_as_company: $("#cb-same-as-company-details").is(":checked"),
        };

        if (!data.dba_same_as_company) {
            data.dba_name = $("#dba-name").val()
            data.dba_street_address = $("#dba-street-address").val()
            data.dba_city = $("#dba-city").val()
            data.dba_state = $("#dba-state").val()
            data.dba_zip = $("#dba-zip").val()
        }

        var error = [];
        if (!data.company_name) error.push("<li>Company Name</l1>");
        if (!data.company_type) error.push("<li>Company Type</l1>");
        if (!data.federal_tax_id) error.push("<li>Federal Tax ID</l1>");
        if (!data.company_street_address) error.push("<li>Company Street Address</l1>");
        if (!data.company_city) error.push("<li>Company City</l1>");
        if (!data.company_state) error.push("<li>Company State</l1>");
        if (!data.company_zip) error.push("<li>Company Zip</l1>");
        if (!data.founded_date) error.push("<li>Company Founded Date</l1>");
        if (!data.dba_same_as_company) {
            if (!data.dba_name) error.push("<li>DBA Name</l1>");
            if (!data.dba_street_address) error.push("<li>DBA Street Address</l1>");
            if (!data.dba_city) error.push("<li>DBA City</l1>");
            if (!data.dba_state) error.push("<li>DBA City</l1>");
            if (!data.dba_zip) error.push("<li>DBA Zip</l1>");
        }

        if (error.length > 0) {
            return swal({
                title: "Please fill all required fields",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        if (!isValidEIN(data.federal_tax_id)) {
            return swal({
                title: "Validation Error",
                text: "Federal Tax ID is not valid",
                html: true,
            });
        }

        //      console.log("UPDATED_DATA", data);

        $(".page-loader-wrapper").show();
        saveMerchantCompanyAndDbaDetails(formElement, data);
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Merchant Onboarding - Business Details Form Submit 
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#save-merchant-business-details-button").on('click', function (e) {
        e.preventDefault()
        $("#merchant-business-details-form").trigger("submit");
    });
    $("#merchant-business-details-form").submit(function (e) {
        e.preventDefault();
        submitMerchantBusinessDetailsForm(e, this);
    });

    function submitMerchantBusinessDetailsForm(e, formElement) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        var data = {
            website: $("#website").val(),
            mailing_address: $("#mailing-address").val(),
            service_description: $("#service-description").val(),
            building_type: $("#building-type").val(),
            number_of_locations: $("#business-locations-count").val(),
            building_ownership: $("#building-ownership").val(),
            area_zoned: $("#area-zoned").val(),
            square_footage: $("#square-footage").val(),
            customer_service_phone: $("#customer-service-phone").val(),
            customer_service_email: $("#customer-service-email").val(),
            corporate_phone: $("#corporate-phone").val(),
            corporate_email: $("#corporate-email").val(),
            corporate_fax: $("#corporate-fax").val(),
            has_bankruptcy: $("#has-bankruptcy").val(),
            bankruptcy_description: $("#bankruptcy-description").val()
        };

        var error = [];
        if (!data.service_description) error.push("<li>Service Description</l1>");
        if (!data.mailing_address) error.push("<li>Mailing Address</l1>");
        if (!data.building_type) error.push("<li>Building Type</l1>");
        if (!data.building_ownership) error.push("<li>Building Ownership</l1>");
        if (!data.area_zoned) error.push("<li>Area Zoned</l1>");
        if (!data.square_footage) error.push("<li>Square Footage</l1>");
        if (!data.customer_service_phone) error.push("<li>Customer Service Phone Number</l1>");
        if (!data.has_bankruptcy) error.push("<li>Has Bankruptcy</l1>");
        if (data.has_bankruptcy && data.has_bankruptcy !== 'Never') {
            if (!data.bankruptcy_description) error.push("<li>Bankruptcy Description</l1>");
        }

        if (error.length > 0) {
            return swal({
                title: "Please fill all required fields",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        if (!isValidUSPhoneNumber(data.customer_service_phone)) error.push("<li>Customer service phone number is not valid</l1>");
        if (!!data.customer_service_email && !isValidEmail(data.customer_service_email)) error.push("<li>Customer service email is not valid</l1>");
        if (!!data.corporate_phone && !isValidUSPhoneNumber(data.corporate_phone)) error.push("<li>Corporate phone number is not valid</l1>");
        if (!!data.corporate_email && !isValidEmail(data.corporate_email)) error.push("<li>Corporate email is not valid</l1>");
        if (!!data.corporate_fax && !isValidUSPhoneNumber(data.corporate_fax)) error.push("<li>Corporate fax number is not valid</l1>");

        if (error.length > 0) {
            return swal({
                title: "Validation Error",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        //      console.log("UPDATED_DATA", data);

        $(".page-loader-wrapper").show();
        saveMerchantBusinessDetails(formElement, data);
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Merchant Onboarding - add principal form submit 
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#add-merchant-principal-button").on('click', function (e) {
        $("#add-merchant-principal-form").trigger("submit");
    });
    $("#add-merchant-principal-form").submit(function (e) {
        // e.preventDefault();
        submitMerchantPricipalForm(e, this);
    });

    function submitMerchantPricipalForm(e, formElement) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        var data = {
            title: $("#principal-title").val(),
            first_name: $("#principal-first-name").val(),
            last_name: $("#principal-last-name").val(),
            phone_number: $("#principal-phone").val(),
            email_address: $("#principal-email").val(),
            dob: $("#principal-dob").val() ? moment($("#principal-dob").val()).format("MM/DD/YYYY") : "",
            license_number: $("#driver-license-number").val(),
            license_state: $("#driver-license-state").val(),
            license_expiration: $("#driver-license-expiration").val() ? moment($("#license-expiration").val()).format("MM/DD/YYYY") : "",
            ssn: $("#principal-ssn").val(),
            street_address: $("#principal-address-street").val(),
            city: $("#principal-city").val(),
            state: $("#principal-state").val(),
            zip: $("#principal-zip").val(),
            ownership_percentage: $("#principal-ownership-percentage").val(),
            is_management: $("#principal-is-management").val(),
        };

        var error = [];
        if (!data.title) error.push("<li>Title</l1>");
        if (!data.first_name) error.push("<li>First Name</l1>");
        if (!data.last_name) error.push("<li>Last Name</l1>");
        if (!data.email_address) error.push("<li>Email Address</l1>");
        if (!data.phone_number) error.push("<li>Phone Number</l1>");
        if (!data.license_number) error.push("<li>Driver's License number</l1>");
        if (!data.license_state) error.push("<li>Driver's License State</l1>");
        if (!data.license_expiration) error.push("<li>Driver's License Expiration</l1>");
        if (!data.dob) error.push("<li>Date of Birth</l1>");
        if (!data.ssn) error.push("<li>Social Security Number</l1>");
        if (!data.street_address) error.push("<li>Street Address</l1>");
        if (!data.city) error.push("<li>City</l1>");
        if (!data.state) error.push("<li>State</l1>");
        if (!data.zip) error.push("<li>Owner ZIP</l1>");
        if (!data.ownership_percentage) error.push("<li>Ownership Percentage</l1>");
        if (!data.is_management) error.push("<li>Is Management</l1>");

        if (error.length > 0) {
            return swal({
                title: "Please fill all required fields",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        if (!isValidSSN(data.ssn)) error.push("<li>SSN is not valid</l1>");
        if (!isValidUSPhoneNumber(data.phone_number)) error.push("<li>Phone number is not valid</l1>");
        if (!isValidEmail(data.email_address)) error.push("<li>Email address is not valid</l1>");

        if (error.length > 0) {
            return swal({
                title: "Validation Error",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        //      console.log("UPDATED_DATA", data);

        $(".page-loader-wrapper").show();
        addMerchantPrincipal(formElement, data);
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Merchant Onboarding - Delete Principal
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $(document).on("click", ".button-delete-principal", function (e) {
        e.preventDefault();
        var deleteConfirm = confirm("Are you sure you want to delete this principal?");
        if (deleteConfirm != true) {
            return false;
        }

        var principalId = $(this).closest("tr").attr("id");
        $(".page-loader-wrapper").show();

        deletePrincipal(principalId);
    });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Merchant Onboarding - processing details form submit 
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#merchant-processing-details-submit-button").on('click', function (e) {
        e.preventDefault();
        $("#merchant-processing-details-form").trigger("submit");
    });
    $("#merchant-processing-details-form").submit(function (e) {
        e.preventDefault();
        submitMerchantProcessingForm(e, this);
    });

    function submitMerchantProcessingForm(e, formElement) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        let businessMonths = []
        $('.business-months').find('input').each((idx, monthInput) => {
            if ($(monthInput).is(':checked')) {
                businessMonths.push($(monthInput).val())
            }
        });

        var data = {
            bank_account_number: $("#bank-account-number").val(),
            bank_routing_number: $("#bank-routing-number").val(),
            monthly_transaction_amount: $("#monthly-transaction-amount").val(),
            average_transaction_amount: $("#average-transaction-amount").val(),
            max_transaction_amount: $("#max-transaction-amount").val(),
            sales_swiped_percentage: $("#sales-swiped-percentage").val(),
            sales_mail_percentage: $("#sales-mail-percentage").val(),
            sales_internet_percentage: $("#sales-internet-percentage").val(),
            is_already_processing: $("#is-already-processing").val(),
            current_processor: $("#current-processor").val(),
            is_terminated: $("#is-terminated").val(),
            termination_reason: $("#termination-reason").val(),
            individual_customers_percentage: $("#individual-customers-percentage").val(),
            business_customers_percentage: $("#business-customers-percentage").val(),
            government_customers_percentage: $("#government-customers-percentage").val(),
            local_sales_percentage: $("#local-sales-percentage").val(),
            national_sales_percentage: $("#national-sales-percentage").val(),
            international_sales_percentage: $("#international-sales-percentage").val(),
            fulfillment_type: $("#fulfillment-policy-fulfillment").val(),
            fulfillment_type_other: $("#fulfillment-policy-fulfillment-other").val(),
            fulfillment_delivery: $("#fulfillment-policy-deliverly").val(),
            fulfillment_delivery_other: $("#fulfillment-policy-deliverly-other").val(),
            has_recurring_payments: $("#has-recurring-payments").val(),
            recurring_payments_description: $("#recurring-payments-description").val(),
            intended_usage_credit_cards: $("#intended-usage-credit-cards").val(),
            intended_usage_pin_debit: $("#intended-usage-pin-debits").val(),
            intended_usage_ebt: $("#intended-usage-ebt").val(),
            intended_usage_fns: $("#ebt-fns-number").val(),
            intended_usage_notes: $("#intended-usage-notes").val(),
            is_business_seasonal: $("#is-business-seasonal").val(),
            business_months: businessMonths,
            has_onsite_inventory: $("#has-onsite-inventory").val(),
            has_offsite_inventory: $("#has-offsite-inventory").val(),
            offsite_inventory_address: $("#offsite-inventory-address").val(),
            has_3rd_party_inventory: $("#has-3rd-party-fulfillment-center").val(),
            has_service_only_inventory: $("#has-service-only-business").val(),
            retail_location: $("#retail-location-address").val(),
            has_external_fulfillment: $("#has-external-company-involved").val(),
            customer_charged_type: $("#when-customer-charged").val(),
            equipment_used: $("#equipment-used").val(),
            how_advertise: $("#how-advertise").val(),
            refund_policy: $("#refund-and-return-policy").val()
        };

        var error = [];
        if (!data.bank_account_number) error.push("<li>Bank Account Number</l1>");
        if (!data.bank_routing_number) error.push("<li>Bank Routing Number</l1>");
        if (!data.monthly_transaction_amount) error.push("<li>Monthly Transaction Amount</l1>");
        if (!data.average_transaction_amount) error.push("<li>Average Transaction Amount</l1>");
        if (!data.max_transaction_amount) error.push("<li>Max Transaction Amount</l1>");
        if (!data.sales_swiped_percentage) error.push("<li>Sales Swiped Percentage</l1>");
        if (!data.sales_mail_percentage) error.push("<li>Sales Mail Percentage</l1>");
        if (!data.sales_internet_percentage) error.push("<li>Sales Internet Percentage</l1>");
        if (!data.is_already_processing) error.push("<li>Is Already Processing</l1>");
        if (data.is_already_processing === 'Yes') {
            if (!data.current_processor) error.push("<li>Current Processor</l1>");
        }
        if (!data.is_terminated) error.push("<li>Is Terminated</l1>");
        if (data.is_terminated === 'Yes') {
            if (!data.termination_reason) error.push("<li>Termination Reason</l1>");
        }
        if (!data.intended_usage_credit_cards) error.push("<li>Intended Usage Credit Card</l1>");
        if (!data.intended_usage_pin_debit) error.push("<li>Intended Usage Pin Debit</l1>");
        if (!data.intended_usage_ebt) error.push("<li>Intended Usage EBT</l1>");
        if (!data.has_onsite_inventory) error.push("<li>Has On-Site Inventory?</l1>");
        if (!data.has_offsite_inventory) error.push("<li>Has Off-Site Inventory?</l1>");
        if (data.has_offsite_inventory === 'Yes') {
            if (!data.offsite_inventory_address) error.push("<li>Off-Site Inventory Address</l1>");
        }
        if (!data.has_3rd_party_inventory) error.push("<li>Using 3rd party fulfillment center?</l1>");
        if (!data.has_service_only_inventory) error.push("<li>Service only business?</l1>");
        if (!data.equipment_used) error.push("<li>Equipment Used</l1>");
        if (!data.refund_policy) error.push("<li>Refund and Return Policy</l1>");

        if (error.length > 0) {
            return swal({
                title: "Please fill all required fields",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        let salesPercentage = data.sales_swiped_percentage + data.sales_mail_percentage + data.sales_internet_percentage;
        if (salesPercentage != 100) {
            error.push("<li>Sales (swiped + mail + internet) percentage is not equal to 100</l1>");
        }

        let customersPercentage = data.individual_customers_percentage + data.business_customers_percentage + data.government_customers_percentage;
        if (customersPercentage != 100) {
            error.push("<li>Individual + Business + Government customers percentage is not equal to 100</l1>");
        }

        let customerSalesPercentage = data.local_sales_percentage + data.national_sales_percentage + data.international_sales_percentage;
        if (customerSalesPercentage != 100) {
            error.push("<li>Local + National + International sales percentage is not equal to 100</l1>");
        }

        //      console.log("UPDATED_DATA", data);

        $(".page-loader-wrapper").show();
        submitMerchantProcessingDetails(formElement, data);
    }


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Merchant Onboarding - ACH details form submit 
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#merchant-ach-details-submit-button").on('click', function (e) {
        e.preventDefault();
        $("#merchant-ach-details-form").trigger("submit");
    });
    $("#merchant-ach-details-form").submit(function (e) {
        e.preventDefault();
        submitMerchantACHForm(e, this);
    });

    function submitMerchantACHForm(e, formElement) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        var data = {
            bank_account_number: $("#ach-bank-account-number").val(),
            bank_routing_number: $("#ach-bank-routing-number").val(),
            monthly_transactions: $("#ach-monthly-transactions").val(),
            monthly_transaction_amount: $("#ach-monthly-transaction-amount").val(),
            average_transaction_amount: $("#ach-average-transaction-amount").val(),
            max_transaction_amount: $("#ach-max-transaction-amount").val(),
            is_processing: $("#ach-is-processing").val(),
            current_processor: $("#ach-current-processor").val(),
            is_terminated: $("#ach-is-terminated").val(),
            termination_reason: $("#ach-termination-reason").val(),
            has_issue_credit: $("#ach-has-issue-credit").val(),
            issue_credit_details: $("#ach-issue-credit-details").val(),
            ccd_percentage: $("#ach-ccd-percentage").val(),
            ppd_percentage: $("#ach-ppd-percentage").val(),
            tel_percentage: $("#ach-tel-percentage").val(),
            web_percentage: $("#ach-web-percentage").val(),
            individual_customers_percentage: $("#ach-individual-customers-percentage").val(),
            business_customers_percentage: $("#ach-business-customers-percentage").val(),
            government_customers_percentage: $("#ach-government-customers-percentage").val(),
            local_sales_percentage: $("#ach-local-sales-percentage").val(),
            national_sales_percentage: $("#ach-national-sales-percentage").val(),
            international_sales_percentage: $("#ach-international-sales-percentage").val(),
            fulfillment_delivery: $("#ach-fulfillment-deliverly").val(),
            fulfillment_delivery_other: $("#ach-fulfillment-deliverly-other").val(),
            has_recurring_payments: $("#ach-has-recurring-payments").val(),
            recurring_payments_description: $("#ach-recurring-payments-description").val(),
            customer_charged_at: $("#ach-customer-charged-at").val(),
            refund_policy: $("#ach-refund-and-return-policy").val()
        };

        var error = [];
        if (!data.bank_account_number) error.push("<li>Bank Account Number</l1>");
        if (!data.bank_routing_number) error.push("<li>Bank Routing Number</l1>");
        if (!data.monthly_transactions) error.push("<li>Monthly Transactions</l1>");
        if (!data.monthly_transaction_amount) error.push("<li>Monthly Transaction Amount</l1>");
        if (!data.average_transaction_amount) error.push("<li>Average Transaction Amount</l1>");
        if (!data.max_transaction_amount) error.push("<li>Max Transaction Amount</l1>");
        if (!data.has_issue_credit) error.push("<li>Will You Need To Issue Credit?</l1>");
        if (!data.issue_credit_details) error.push("<li>Issue Credit Details</l1>");
        if (!data.ccd_percentage) error.push("<li>CCD Percentage</l1>");
        if (!data.ppd_percentage) error.push("<li>PPD Percentage</l1>");
        if (!data.tel_percentage) error.push("<li>TEL Percentage</l1>");
        if (!data.web_percentage) error.push("<li>WEB Percentage</l1>");
        if (data.is_processing === 'Yes') {
            if (!data.current_processor) error.push("<li>Current Processor</l1>");
        }
        if (data.is_terminated === 'Yes') {
            if (!data.termination_reason) error.push("<li>Termination Reason</l1>");
        }
        if (!data.fulfillment_delivery) error.push("<li>Fulfillment Delivery</l1>");
        if (data.fulfillment_delivery === 'other') {
            if (!data.fulfillment_delivery_other) error.push("<li>Other Fulfillment Delivery</l1>");
        }
        if (!data.customer_charged_at) error.push("<li>Customer Charged At</l1>");
        if (!data.refund_policy) error.push("<li>Refund and Return Policy</l1>");

        if (error.length > 0) {
            return swal({
                title: "Please fill all required fields",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        let customersPercentage = data.individual_customers_percentage + data.business_customers_percentage + data.government_customers_percentage;
        if (customersPercentage != 100) {
            error.push("<li>Individual + Business + Government customers percentage is not equal to 100</l1>");
        }

        let customerSalesPercentage = data.local_sales_percentage + data.national_sales_percentage + data.international_sales_percentage;
        if (customerSalesPercentage != 100) {
            error.push("<li>Local + National + International sales percentage is not equal to 100</l1>");
        }

        //      console.log("UPDATED_DATA", data);

        $(".page-loader-wrapper").show();
        submitMerchantACHDetails(formElement, data);
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Merchant registration form submit 
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("merchant-application-form .submit-button").on('click', function (e) {
        e.preventDefault();
        $("#merchant-registration-form").trigger("submit");
    });
    $("#merchant-registration-form").submit(function (e) {
        e.preventDefault();
        submitMerchantRegistrationForm(e, this);
    });

    function submitMerchantRegistrationForm(e, formElement) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        var data = {
            businessName: $("#business-name").val(),
            first_name: $("#first-name").val(),
            last_name: $("#last-name").val(),
            phone_number: $("#phone").val(),
            email_address: $("#email").val(),
            password: $("#password").val(),
            confirm_password: $("#confirm-password").val(),
            terms_of_service: $('#terms-of-service').prop('checked'),
        };

        var error = [];
        if (!data.first_name) error.push("<li>Business Name</l1>");
        if (!data.first_name) error.push("<li>First Name</l1>");
        if (!data.last_name) error.push("<li>Last Name</l1>");
        if (!data.email_address) error.push("<li>Email Address</l1>");
        if (!data.phone_number) error.push("<li>Phone Number</l1>");
        if (!data.password) error.push("<li>Password</l1>");

        if (error.length > 0) {
            return swal({
                title: "Please fill all required fields",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        if (data.password != data.confirm_password) {
            return swal({
                title: "Password and confirm password not matched",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        } else if (data.password.length < 8) {
            return swal({
                title: "Password should be atleast 8 characters long",
                html: true,
            });
        }

        if (!data.terms_of_service) {
            return swal({
                title: "Please accept terms of service",
                html: true,
            });
        }

        //      console.log("FORM_DATA", data);

        // $(".page-loader-wrapper").show();
        // registerMerchant(formElement, data);
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Merchant application form init
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#phone,#processing-volume,#business-phone,#business-zip,#admin-phone,#technical-phone,#mailing-address-zip").on("keypress", function (e) {
        const key = e.which || e.keyCode;
        if (!(key >= 48 && key <= 57)) {
            e.preventDefault();
        }
    });


    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Merchant Application form submit
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#merchant-application-submit-button,#merchant-application-form button[type=submit]").on("click", function (e) {
        e.preventDefault();
        $("#merchant-application-form").trigger("submit");
    });
    $("#merchant-application-form").submit(function (e) {
        e.preventDefault();
        submitMerchantApplicationForm(e, this);
    });

    function submitMerchantApplicationForm(e, formElement) {
        e.preventDefault();
        var loggedInUser = getLoggedInPartner();
        if (!loggedInUser) {
            alert("Your session has expired, please login to continue");
            location.href = baseURL;
            return;
        }

        var data = {
            business_name: $("#business-name").val(),
            first_name: $("#first-name").val(),
            last_name: $("#last-name").val(),
            phone_number: $("#phone").val(),
            email_address: $("#email").val(),
            currency: $("#currency").val(),
            special_offers: false,

            company_name: $("#company-name").val(),
            trade_name: $("#trade-name").val(),
            company_type: $("#company-type").val(),
            business_description: $("#business-description").val(),
            processing_volume: $("#processing-volume").val(),
            website: $("#website").val(),
            business_address: $("#business-address").val(),
            business_city: $("#business-city").val(),
            business_state: $("#business-state").val(),
            business_country: $("#business-country").val(),
            business_zip: $("#business-zip").val(),

            admin_name: $("#admin-name").val(),
            admin_phone: $("#admin-phone").val(),
            admin_email: $("#admin-email").val(),
            technical_name: $("#technical-name").val(),
            technical_phone: $("#technical-phone").val(),
            technical_email: $("#technical-email").val(),

            mailing_address: $("#mailing-address").val(),
            mailing_address_city: $("#mailing-address-city").val(),
            mailing_address_state: $("#mailing-address-state").val(),
            mailing_address_zip: $("#mailing-address-zip").val(),
            mailing_address_country: $("#mailing-address-country").val(),

        };

        var error = [];
        if (!data.first_name) error.push("<li>First Name</l1>");
        if (!data.last_name) error.push("<li>Last Name</l1>");
        if (!data.email_address) error.push("<li>Email Address</l1>");
        if (!data.phone_number) error.push("<li>Phone Number</l1>");
        if (!data.business_name) error.push("<li>Business Name</l1>");

        if (!data.company_name) error.push("<li>Company Name</l1>");
        if (!data.company_type) error.push("<li>Company Type</l1>");
        if (!data.business_description) error.push("<li>About Business</l1>");
        if (!data.business_address) error.push("<li>Business Address</l1>");
        if (!data.business_city) error.push("<li>Business city</l1>");
        if (!data.business_state) error.push("<li>Business State</l1>");
        if (!data.business_country) error.push("<li>Business Country</l1>");
        if (!data.business_zip) error.push("<li>Business Zip</l1>");

        if (!data.admin_name) error.push("<li>Admin Name</l1>");
        if (!data.admin_email) error.push("<li>Admin Email Address</l1>");
        if (!data.admin_phone) error.push("<li>Admin Phone Number</l1>");

        if (!data.mailing_address) error.push("<li>Mailing Address</l1>");
        if (!data.mailing_address_city) error.push("<li>Mailing Address City</l1>");
        if (!data.mailing_address_state) error.push("<li>Mailing Address State</l1>");
        if (!data.mailing_address_country) error.push("<li>Mailing Address Country</l1>");
        if (!data.mailing_address_zip) error.push("<li>Mailing Address Zip</l1>");

        if (error.length > 0) {
            return swal({
                title: "Please fill all required fields",
                text: `<ul>${error.join("\n")}</ul>`,
                html: true,
            });
        }

        //      console.log("FORM_DATA", data);

        $(".page-loader-wrapper").show();
        submitMerchantApplication(formElement, data);
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * View Merchnat Event Details
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $(document).on("click", ".button-view-event", function (e) {
        e.preventDefault();
        var eventId = $(this).closest("tr").attr("id");
        location.href = `${baseURL}admin/merchant_event_details/${eventId}`;
    });

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Delete User
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    function deletes() {
        e.preventDefault();
        var deleteConfirm = confirm("Are you sure you want to delete this user?");
        if (deleteConfirm != true) {
            return false;
        }

        var userId = $(this).closest("tr").attr("id");
        $(".page-loader-wrapper").show();

        deleteUser(userId);
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     * Logout Action
     * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     */

    $("#logout-button").on("click", function (e) {
        e.preventDefault();
        logout();
    });
});
//==========================================================================================================================

/* Api Functions ======================================================================================================*/
var dailyPlannedTasks = {};
var currentUserToEdit = undefined;
var apiBaseURL = baseURL + "api/api"; // develop

function login(formElement) {
    var data = {
        username: $(formElement).find("[name=username]").val(),
        password: $(formElement).find("[name=password]").val(),
    };
    $(".page-loader-wrapper").show();
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/login`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            console.log(response)
            var data = response.data;
            $(".page-loader-wrapper").hide();
            if (response.status == 1 && data) {
                $(formElement)[0].reset();
                var partner = data.partner;
                partner.partner_password = "";
                localStorage.setItem("partner", JSON.stringify(partner));
                location.href = data.redirectUrl;
            } else if (response.status == -15) {
                showErrorNotification("Password format is invalid");
            } else {
                showErrorNotification(response.message);
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function createNewUser(formElement, data) {
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/register`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            $(".page-loader-wrapper").hide();
            var data = response.data;
            //      console.log("REGISTER_RESPONSE", response);
            if (data && response.status == 1) {
                // $(formElement)[0].reset();

                var user = data.user;
                user.password = "";
                localStorage.setItem("user", JSON.stringify(user));
                location.href = data.redirectUrl;
            } else {
                showErrorNotification(response.message);
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function loadUserDetails(userId) {
    $(".page-loader-wrapper").show();
    $.ajax({
        type: "GET",
        url: `${apiBaseURL}/user/${userId}`,
        contentType: "application/json",
        success: function (response) {
            $(".page-loader-wrapper").hide();
            var data = response.data;
            //      console.log("USER_RESPONSE", response);
            if (data && response.status == 1) {
                let user = response.data
                $.AdminBSB.userToEdit = user

                loadUserDetailsInForm(user)
            } else {
                showErrorNotification(response.message);
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function loadProfileDetails() {
    var loggedInUser = getLoggedInPartner();
    if (!loggedInUser) {
        alert("Your session has expired, please login to continue");
        location.href = baseURL;
        return;
    }
    $.AdminBSB.userToEdit = loggedInUser

    loadUserDetailsInForm(loggedInUser)
}

function loadUserDetailsInForm(user) {
    $("#first-name").val(user.first_name)
    $("#last-name").val(user.last_name)
    $("#email").val(user.email)
    $("#phone").val(user.phone)
    $("#dob").val(user.dob ? moment(user.dob).format('DD/MM/YYYY') : '')
    $("#ssn").val(user.ssn)
    $("#address").val(user.address)
    $("#city").val(user.city)
    $("#user-state").val(user.state)
    $("#postcode").val(user.postcode)
    $("#license-number").val(user.driving_license)
    $('#business-name').val(user.business_name)
    $('#business-type').val(user.business_type)
    $('#business-address').val(user.business_address)
    $('#business-city').val(user.business_city)
    $('#business-state').val(user.business_state)
    $('#business-zip').val(user.business_zip)
    $('#ein-number').val(user.ein)
    $('#founded-date').val(user.business_start_date ? moment(user.business_start_date).format('DD/MM/YYYY') : '')
    $('#bank-name').val(user.bank_name)
    $('#bank-account-number').val(user.bank_account_number)
    $('#name-of-account').val(user.name_on_account)
    $('#routing-number').val(user.routing_number)
}

function updateUser(userId, data) {
    data['user_id'] = userId
    var loggedInUser = getLoggedInPartner();

    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/updateUser`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            $(".page-loader-wrapper").hide();
            var data = response.data;
            if (data && response.status == 1) {
                if (loggedInUser && loggedInUser.ID === data.ID) {
                    localStorage.setItem("user", JSON.stringify(data));
                }
                showSuccessNotification('User details updated successfully')
            } else {
                showErrorNotification(response.message);
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function deleteUser(userId) {
    $.ajax({
        type: "DELETE",
        url: `${apiBaseURL}/deleteUser/${userId}`,
        contentType: "application/json",
        success: function (response) {
            $(".page-loader-wrapper").hide();
            if (response && response.status == 1) {
                showSuccessNotification("User deleted successfully");
                setTimeout(function () {
                    location.href = `${baseURL}admin/users`
                }, 600)
            } else {
                showErrorNotification();
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function createCapitalApplication(formElement, applicationData) {
    $(".page-loader-wrapper").show();
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/create_capital_application`,
        contentType: "application/json",
        data: JSON.stringify(applicationData),
        success: function (response) {
            //      console.log(response);
            $(".page-loader-wrapper").hide();
            if (response && response.status == 1) {
                $(formElement)[0].reset();
                showSuccessNotification("Application created successfully");
                setTimeout(function () {
                    window.history.back();
                }, 500);
            } else if (!!response.message) {
                showErrorNotification(response.message);
            } else {
                showErrorNotification();
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error, xhr, status);
        },
    });
}

// function fetchUsers(type = null) {
//     $.ajax({
//         type: "GET",
//         url: `${apiBaseURL}/users`,
//         contentType: "application/json",
//         success: function (response) {
//             var data = response.data;
//             if (data && response.status == 1) {
//                 if (type) {
//                     loadSubscriptionUsersInTable(data)
//                     userTablePagination()
//                 } else {
//                     loadUsersInTable(data);
//                     userTablePagination()
//                     loadUsersInTableExport(data)

//                 }
//             } else {
//                 showErrorNotification();
//             }
//         },
//         error: function (xhr, status, error) {
//             showErrorNotification();
//        //      console.log(error);
//         },
//     });
// }

// function loadUsersInTable(data) {
//     var user = '';
//     $.each(data, function (key, value) {

//         //CONSTRUCTION OF ROWS HAVING
//         // DATA FROM JSON OBJECT
//         if (value.free_trial > 0 && value.subscription_id < 1) {
//             user += `<tr id="${value.ID}" class="table-success user-table-row">`;
//         } else if (value.free_trial == 0 && value.subscription_id == null) {
//             user += `<tr id="${value.ID}" class="table-danger user-table-row">`;
//         } else {
//             user += `<tr id="${value.ID}" class="user-table-row">`;
//         }
//         // user += `<td><input class="inside-table-checkbox" type="checkbox" id=tableCheckboxID-${value.ID} onchange="insideCheckoxFunction(this.id)"></td>`
//         user += '<td>' +
//             value.first_name + ' ' + value.last_name + '</td>';

//         user += '<td>' +
//             value.phone + '</td>';

//         user += '<td>' +
//             value.email + '</td>';

//         user += '<td>' +
//             value.dob + '</td>';


//         user += `<td class="user-three-dots-menu-td">
//                     <div class="user-dropdown">
//                     <i class="material-icons user-three-dots-menu" id="id-${value.ID}" onClick="userThreeDotsDropdownFunction(this.id)">more_vert</i>
//                         <div id="userThreeDotsDropdown" class="user-three-dots-dropdown">
//                             <a onclick="viewUserProfile(${value.ID})" href="javascript:void(0)" id="${value.ID}"><i class="ri-eye-line"></i><span class="text-span">View User</span></a>
//                             <a href="javascript:void(0)" id="${value.ID}"><i class="ri-pencil-line"></i><span class="text-span">Edit User</span></a>
//                             <a href="javascript:void(0)" id="${value.ID}"><i class="ri-delete-bin-line"></i><span class="text-span">Delete User</span></a>
//                         </div>
//                     </div>
//                 </td>`;

//         user += '</tr>';
//     });
//     //INSERTING ROWS INTO TABLE 
//     $('#user-list-table').append(user);

// }

function fetchCreditReports() {
    $.ajax({
        type: "GET",
        url: `${apiBaseURL}/get_credit_card_applications`,
        contentType: "application/json",
        success: function (response) {
            var data = response.data;
            if (data && response.status == 1) {
                loadCreditReportsInTable(data);
            } else {
                showErrorNotification();
            }
        },
        error: function (xhr, status, error) {
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function loadCreditReportsInTable(data) {
    var user = '';
    $.each(data, function (key, value) {

        //CONSTRUCTION OF ROWS HAVING
        // DATA FROM JSON OBJECT
        if (value.free_trial > 0) {
            user += '<tr class="table-success">';
        } else if (value.free_trial == 0 && value.subscription_id == null) {
            user += '<tr class="table-danger">';
        } else {
            user += '<tr>';
        }
        user += '<td>' +
            value.first_name + ' ' + value.last_name + '</td>';

        user += '<td>' +
            value.phone + '</td>';

        user += '<td>' +
            value.email + '</td>';

        user += '<td>' +
            value.dob + '</td>';

        user += '<td>' +
            value.ssn + '</td>';

        user += '<td><div class="flex align-items-center list-user-action">' +
            '<a class="iq-bg-primary view" data-toggle="tooltip" data-placement="top" id="view' + value.ID + '" title="View User" data-original-title="View" href="javscript:void(0)"><i class="ri-eye-line"></i></a>' +
            '<a class="iq-bg-primary edit" data-toggle="tooltip" data-placement="top" id="edit' + value.ID + '" title="Edit User" data-original-title="Edit" href="#"><i class="ri-pencil-line"></i></a>' +
            '<a class="iq-bg-primary delete" data-toggle="tooltip" data-placement="top" id="delete' + value.ID + '" title="Delete User" data-original-title="Delete" href="#"><i class="ri-delete-bin-line"></i></a>';
        if (value.status == 0) {
            user += '<a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" id="active' + value.ID + '" title="Active User" data-original-title="Delete" href="#"><i class="ri-checkbox-circle-fill" style="color:green"></i></i></a>';
        }
        else {
            user += '<a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" id="' + value.ID + '" title="Deactive User" data-original-title="Delete" href="#"><i class="ri-indeterminate-circle-fill" style="color:red"></i></i></a>' +
                '</div></td>';
        }
        user += '</tr>';
    });

    //INSERTING ROWS INTO TABLE 
    $('#user-list-table').append(user);
}

function selectMerchantCampaign(campaignId) {
    $(".page-loader-wrapper").show();

    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/select_merchant_campaign`,
        contentType: "application/json",
        data: JSON.stringify({ campaignId }),
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.status === 1) {
                location.href = response.redirect_url
            } else {
                showErrorNotification(response.message)
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
        },
    });
}

function createMaverickApplication() {
    $(".page-loader-wrapper").show();

    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/create_maverick_application`,
        contentType: "application/json",
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.status === 1) {
                location.href = response.redirect_url
            } else {
                showErrorNotification(response.message)
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
        },
    });
}

function editMaverickApplication(applicationId) {
    $(".page-loader-wrapper").show();

    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/load_maverick_application_to_edit`,
        contentType: "application/json",
        data: JSON.stringify({ applicationId }),
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.status === 1) {
                location.href = `${baseURL}merchant_onboarding/company_and_dba_details`
            } else {
                showErrorNotification(response.message)
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
        },
    });
}

function saveMerchantCompanyAndDbaDetails(formElement, data) {
    $(".page-loader-wrapper").hide();

    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/save_merchant_company_dba_details`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.status === 1) {
                location.href = response.redirect_url
            } else {
                showErrorNotification(response.message)
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
        },
    });
}

function saveMerchantBusinessDetails(formElement, data) {
    $(".page-loader-wrapper").show();

    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/save_merchant_business_details`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.status === 1) {
                location.href = response.redirect_url
            } else {
                showErrorNotification(response.message)
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
        },
    });
}

function addMerchantPrincipal(formElement, data) {
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/add_merchant_principal`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.status === 1) {
                $(formElement)[0].reset();
                showSuccessNotification('Principal added successfully')
                setTimeout(function (e) {
                    location.href = response.redirect_url
                })
            } else {
                showErrorNotification(response.message)
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function deletePrincipal(principalId) {
    $(".page-loader-wrapper").show();

    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/delete_merchant_principal`,
        contentType: "application/json",
        data: JSON.stringify({ principalId }),
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.status === 1) {
                showSuccessNotification('Principal added successfully')
                setTimeout(function (e) {
                    location.href = response.redirect_url
                })
            } else {
                showErrorNotification(response.message)
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function loadMaverickApplicationDetails() {
    $(".page-loader-wrapper").show();

    $.ajax({
        type: "GET",
        url: `${apiBaseURL}/get_maverick_application_details`,
        contentType: "application/json",
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();
            let application = response.data;
            if (!application) return

            // loading comapny & dba detail
            let company = application.company
            let dba = application.dba
            if (company) {
                $("#company-name").val(company.name)
                $("#company-type").val(company.type)
                $("#company-federal-tax-id").val(company.federalTaxId)
                $("#company-street-address").val(company.address ? company.address.street : '')
                $("#company-city").val(company.address ? company.address.city : '')
                $("#company-state").val(company.address ? company.address.state.code : '')
                $("#company-zip").val(company.address ? company.address.zip : '')
                $("#founded-date").val(company.founded ? moment(company.founded).format('DD/MM/YYYY') : '')
            }
            if (dba) {
                $("#cb-same-as-company-details").prop('checked', dba.sameAsComapny === 'Yes')
                $("#dba-name").val(dba.name)
                $("#dba-street-address").val(dba.address ? dba.address.street : '')
                $("#dba-city").val(dba.address ? dba.address.city : '')
                $("#dba-state").val(dba.address ? dba.address.state.code : '')
                $("#dba-zip").val(dba.address ? dba.address.zip : '')
            }

            // loading business information
            $("#website").val(application.website)
            $("#mailing-address").val(application.mailingAddress)
            $("#service-description").val(application.serviceDescription)
            if (application.businessLocation) {
                $("#building-type").val(application.businessLocation.buildingType)
                $("#business-locations-count").val(application.businessLocation.numberOfLocations)
                $("#building-ownership").val(application.businessLocation.buildingOwnership)
                $("#area-zoned").val(application.businessLocation.areaZoned)
                $("#square-footage").val(application.businessLocation.squareFootage)
            }
            if (application.customerServiceContact) {
                $("#customer-service-phone").val(application.customerServiceContact.phone)
                $("#customer-service-email").val(application.customerServiceContact.email)
            }
            if (application.corporateContact) {
                $("#corporate-phone").val(application.corporateContact.phone)
                $("#corporate-email").val(application.corporateContact.email)
                $("#corporate-fax").val(application.corporateContact.fax)
            }
            if (typeof application.bankruptcy === 'object') {
                $("#has-bankruptcy").val(application.bankruptcy.hasBankruptcy)
                $("#bankruptcy-description").val(application.bankruptcy.description)
            } else if (application.bankruptcy) {
                $("#has-bankruptcy").val(application.bankruptcy)
            }

            // loading processing details
            let processing = application.processing
            if (processing) {
                if (processing.bank) {
                    $("#bank-account-number").val(processing.bank.accountNumber)
                    $("#bank-routing-number").val(processing.bank.routingNumber)
                }
                if (processing.volumes) {
                    $("#monthly-transaction-amount").val(processing.volumes.monthlyTransactionAmount)
                    $("#average-transaction-amount").val(processing.volumes.avgTransactionAmount)
                    $("#max-transaction-amount").val(processing.volumes.maxTransactionAmount)
                }
                if (processing.sales) {
                    $("#sales-swiped-percentage").val(processing.sales.swiped)
                    $("#sales-mail-percentage").val(processing.sales.mail)
                    $("#sales-internet-percentage").val(processing.sales.internet)
                }
                if (processing.alreadyProcessing) {
                    $("#is-already-processing").val(processing.alreadyProcessing.isProcessing)
                    $("#current-processor").val(processing.alreadyProcessing.processor)
                }
                if (processing.terminated) {
                    $("#is-terminated").val(processing.terminated.isTerminated)
                    $("#termination-reason").val(processing.terminated.description)
                }
                if (processing.customers) {
                    if (processing.customers.type) {
                        $("#individual-customers-percentage").val(processing.customers.type.individual)
                        $("#business-customers-percentage").val(processing.customers.type.business)
                        $("#government-customers-percentage").val(processing.customers.type.government)
                    }
                    if (processing.customers.location) {
                        $("#local-sales-percentage").val(processing.customers.location.local)
                        $("#national-sales-percentage").val(processing.customers.location.national)
                        $("#international-sales-percentage").val(processing.customers.location.international)
                    }
                }
                if (processing.fulfillmentPolicy) {
                    $("#fulfillment-policy-fulfillment").val(processing.fulfillmentPolicy.fulfillment)
                    $("#fulfillment-policy-fulfillment-other").val(processing.fulfillmentPolicy.fulfillmentOther)
                    $("#fulfillment-policy-deliverly").val(processing.fulfillmentPolicy.delivery)
                    $("#fulfillment-policy-deliverly-other").val(processing.fulfillmentPolicy.deliveryOther)
                }
                if (processing.recurringPayments) {
                    $("#has-recurring-payments").val(processing.recurringPayments.hasRecurring)
                    $("#recurring-payments-description").val(processing.recurringPayments.description)
                }
                if (processing.intendedUsage) {
                    $("#intended-usage-credit-cards").val(processing.intendedUsage.creditCards)
                    $("#intended-usage-pin-debits").val(processing.intendedUsage.pinDebit)
                    $("#intended-usage-ebt").val(processing.intendedUsage.ebt)
                    $("#ebt-fns-number").val(processing.intendedUsage.fns)
                    $("#intended-usage-notes").val(processing.intendedUsage.notes)
                }
                if (processing.seasonalBusiness) {
                    $("#is-business-seasonal").val(processing.seasonalBusiness.isSeasonal)
                    if (processing.seasonalBusiness.months) {
                        processing.seasonalBusiness.months.forEach(month => {
                            $(`.business-months input[value|='${month}']`).prop('checked', true)
                        });
                    }
                }
                if (processing.inventory) {
                    $("#has-onsite-inventory").val(processing.inventory.onSite)
                    $("#has-offsite-inventory").val(processing.inventory.offSite)
                    $("#offsite-inventory-address").val(processing.inventory.offSiteAddress)
                    $("#has-3rd-party-fulfillment-center").val(processing.inventory.thirdParty)
                    $("#has-service-only-business").val(processing.inventory.serviceOnly)
                }
                $("#retail-location-address").val(processing.retailLocation)
                $("#has-external-company-involved").val(processing.externalFulfillment)
                $("#when-customer-charged").val(processing.customerCharged)
                $("#equipment-used").val(processing.equipmentUsed)
                $("#how-advertise").val(processing.advertise)
                $("#refund-and-return-policy").val(processing.refundPolicy)
            }

            let ach = application.ach
            if (ach) {
                if (ach.bank) {
                    $("#ach-bank-account-number").val(ach.bank.accountNumber)
                    $("#ach-bank-routing-number").val(ach.bank.routingNumber)
                }
                if (ach.volumes) {
                    $("#ach-monthly-transactions").val(ach.volumes.monthlyTransactions)
                    $("#ach-monthly-transaction-amount").val(ach.volumes.monthlyTransactionAmount)
                    $("#ach-average-transaction-amount").val(ach.volumes.avgTransactionAmount)
                    $("#ach-max-transaction-amount").val(ach.volumes.maxTransactionAmount)
                }
                if (ach.issueCredits) {
                    $("#ach-has-issue-credit").val(ach.issueCredits.hasIssueCredits ? ach.issueCredits.hasIssueCredits : 'No')
                    $("#ach-issue-credit-details").val(ach.issueCredits.description)
                }
                if (ach.secCodes) {
                    $("#ach-ccd-percentage").val(ach.secCodes.ccd)
                    $("#ach-ppd-percentage").val(ach.secCodes.ppd)
                    $("#ach-tel-percentage").val(ach.secCodes.tel)
                    $("#ach-web-percentage").val(ach.secCodes.web)
                }
                if (ach.alreadyProcessing) {
                    $("#ach-is-processing").val(ach.alreadyProcessing.isProcessing ? ach.alreadyProcessing.isProcessing : 'No')
                    $("#ach-current-processor").val(ach.alreadyProcessing.processor)
                }
                if (ach.terminated) {
                    $("#ach-is-terminated").val(ach.terminated.isTerminated ? ach.terminated.isTerminated : 'No')
                    $("#ach-termination-reason").val(ach.terminated.description)
                }
                if (ach.customers) {
                    if (ach.customers.type) {
                        $("#ach-individual-customers-percentage").val(ach.customers.type.individual)
                        $("#ach-business-customers-percentage").val(ach.customers.type.business)
                        $("#ach-government-customers-percentage").val(ach.customers.type.government)
                    }
                    if (ach.customers.location) {
                        $("#ach-local-sales-percentage").val(ach.customers.location.local)
                        $("#ach-national-sales-percentage").val(ach.customers.location.national)
                        $("#ach-international-sales-percentage").val(ach.customers.location.international)
                    }
                }
                if (ach.fulfillmentPolicy) {
                    $("#ach-fulfillment-deliverly").val(ach.fulfillmentPolicy.delivery)
                    $("#ach-fulfillment-deliverly-other").val(ach.fulfillmentPolicy.deliveryOther)
                }
                if (ach.recurringPayments) {
                    $("#ach-has-recurring-payments").val(ach.recurringPayments.hasRecurring)
                    $("#ach-recurring-payments-description").val(ach.recurringPayments.description)
                }
                $("#ach-customer-charged-at").val(ach.customerCharged)
                $("#ach-refund-and-return-policy").val(ach.refundPolicy)
            }

        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
        },
    });
}

function saveMaverickBusinessAndPrincipalsInfo() {
    $(".page-loader-wrapper").show();
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/save_maverick_business_info_and_principals`,
        contentType: "application/json",
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.status === 1) {
                showSuccessNotification('Application saved successfully')
                if (response.redirect_url) {
                    setTimeout(function (e) { location.href = response.redirect_url }, 400)
                }
            } else {
                showErrorNotification(response.message)
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function submitMerchantProcessingDetails(formElement, data) {
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/save_merchant_processing_details`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.status === 1) {
                $(formElement)[0].reset();
                location.href = `${baseURL}merchant_onboarding/ach_details`
            } else {
                showErrorNotification(response.message)
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function submitMerchantACHDetails(formElement, data) {
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/save_merchant_ach_details`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.status === 1) {
                $(formElement)[0].reset();
                location.href = `${baseURL}merchant_onboarding/documents_and_signature`
            } else {
                showErrorNotification(response.message)
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function registerMerchant(formElement, data) {
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/register_merchant`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.message && response.status === 1) {
                $(formElement)[0].reset();
                showSuccessNotification(response.message)
            } else {
                showErrorNotification(response.message ? response.message : "Something went wrong!")
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function submitMerchantApplication(formElement, data) {
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/submit_merchant_application`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            //      console.log(response)
            $(".page-loader-wrapper").hide();

            if (response.message && response.status === 1) {
                $(formElement)[0].reset();
                showSuccessNotification(response.message)
            } else {
                showErrorNotification(response.message ? response.message : "Something went wrong!")
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function logout() {
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}app/logout`,
        contentType: "application/x-www-form-urlencoded",
        data: {},
        success: function (response) {
            var data = JSON.parse(response);
            if (data && data.statusCode === 1) {
                location.href = baseURL;
                localStorage.clear();
                showSuccessNotification("Logged out successfully!");
            } else {
                showErrorNotification();
            }
        },
        error: function (xhr, status, error) {
            //      console.log(error);
        },
    });
}

function confirmationbox(title, text, type, YBT, CBT) {
    swal({
        title: title,
        text: text,
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: YBT,
        cancelButtonText: CBT,
        closeOnConfirm: false,
        closeOnCancel: false
    },
        function (isConfirm) {
            if (isConfirm) {
                // swal("Shortlisted!", "Candidates are successfully shortlisted!", "success");
                window.location.replace(baseURL + 'users');
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
}

function tableSearchBox() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("UserInputSearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("user-list-table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function fetchCreditCardApplication() {
    $.ajax({
        type: "GET",
        url: `${apiBaseURL}/get_credit_card_applications`,
        contentType: "application/json",
        success: function (response) {
            var data = response.data;
            if (data && response.status == 1) {
                loadCardInTable(data);
                userTablePagination()
            } else {
                showErrorNotification();
            }
        },
        error: function (xhr, status, error) {
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function loadCardInTable(data) {
    var user = '';
    $.each(data, function (key, value) {

        user += `<tr id="${value.ID}" class="user-table-row">`;

        user += '<td>' +
            value.ID + '</td>';

        user += '<td>' +
            value.company_name + '</td>';

        user += '<td>' +
            value.administrator_email_address + '</td>';

        user += '<td>' +
            value.administrator_phone_number + '</td>';

        user += '<td>' +
            value.tax_id + '</td>';

        user += '<td>' +
            value.parent_company_name + '</td>';

        user += '<td>' +
            value.created_at + '</td>';

        // user += '<td>' +
        //     value.updated_at + '</td>';


        user += '</tr>';
    });
    //INSERTING ROWS INTO TABLE 
    $('#credit-card-application').append(user);

}

function fetchCreditSafeApplication() {
    $.ajax({
        type: "GET",
        url: `${apiBaseURL}/creditsafe_reports`,
        contentType: "application/json",
        success: function (response) {
            //      console.log(response)
            var data = response.data;
            if (data && response.status == 1) {
                loadCreditSafeInTable(data);
                userTablePagination()
            } else {
                showErrorNotification();
            }
        },
        error: function (xhr, status, error) {
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function loadCreditSafeInTable(data) {
    var user = '';
    $.each(data, function (key, value) {
        if (value.first_name) {
            user += `<tr id="${value.ID}" class="user-table-row">`;

            user += '<td>' +
                value.first_name + ' ' + value.last_name + '</td>';

            user += '<td>' +
                value.company_id + '</td>';

            user += '<td>' +
                JSON.parse(value.searchData).companySummary.businessName + '</td>';

            user += '<td>' +
                value.searched_at + '</td>';

            user += '</tr>';
        }
    });
    //INSERTING ROWS INTO TABLE 
    $('#credit-safe-reports').append(user);

}

function loadUsersInTableExport(data) {
    var user = '';
    $.each(data, function (key, value) {

        //CONSTRUCTION OF ROWS HAVING
        // DATA FROM JSON OBJECT
        if (value.free_trial > 0) {
            user += `<tr id="${value.ID}" class="table-success user-table-row">`;
        } else if (value.free_trial == 0 && value.subscription_id == null) {
            user += `<tr id="${value.ID}" class="table-danger user-table-row">`;
        } else {
            user += `<tr id="${value.ID}" class="user-table-row">`;
        }
        // user += `<td><input class="inside-table-checkbox" type="checkbox" id=tableCheckboxID-${value.ID} onchange="insideCheckoxFunction(this.id)"></td>`
        user += '<td>' +
            value.first_name + ' ' + value.last_name + '</td>';

        user += '<td>' +
            value.phone + '</td>';

        user += '<td>' +
            value.email + '</td>';

        user += '<td>' +
            value.dob + '</td>';

        user += '<td>' +
            value.created_at + '</td>';

        user += '<td>' +
            value.last_login + '</td>';

        user += '<td>' +
            value.address + '</td>';

        user += '</tr>';
    });
    //INSERTING ROWS INTO TABLE 
    $('#user-list-table1').append(user);

}

// ==========Personal Credit Scores===============
function fetchBusinessCreditScores() {
    $.ajax({
        type: "GET",
        url: `${apiBaseURL}/business_credit_scores`,
        contentType: "application/json",
        success: function (response) {
            // console.log(response)
            var data = response.data;
            if (data && response.status == 1) {
                loadBusinessCreditScoresInTable(data);
                userTablePagination()
            } else {
                showErrorNotification();
            }
        },
        error: function (xhr, status, error) {
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function loadBusinessCreditScoresInTable(data) {
    var bscore = '';
    $.each(data, function (key, value) {
        if (value.dnb != null || value.experian != null) {
            bscore += `<tr id="${value.ID}" class="user-table-row">`;

            bscore += '<td>' +
                value.first_name + ' ' + value.last_name + '</td>';

            bscore += '<td>' +
                value.application_id + '</td>';

            bscore += '<td>' +
                value.dnb + '</td>';

            bscore += '<td>' +
                value.experian + '</td>';

            bscore += '<td>' +
                value.created_at + '</td>';

            bscore += '</tr>';
        }
    });
    //INSERTING ROWS INTO TABLE 
    $('#business-credit-scores').append(bscore);

}

function fetchPersonalCreditScores() {
    $.ajax({
        type: "GET",
        url: `${apiBaseURL}/personal_credit_scores`,
        contentType: "application/json",
        success: function (response) {
            // console.log(response)
            var data = response.data;
            if (data && response.status == 1) {
                loadPersonalCreditScoresInTable(data);
                userTablePagination()
            } else {
                showErrorNotification();
            }
        },
        error: function (xhr, status, error) {
            showErrorNotification();
            //      console.log(error);
        },
    });
}

function loadPersonalCreditScoresInTable(data) {
    var bscore = '';
    $.each(data, function (key, value) {
        if (value.experian != 0 || value.equifax != 0 || value.transunion != 0) {
            bscore += `<tr id="${value.ID}" class="user-table-row">`;

            bscore += '<td>' +
                value.first_name + ' ' + value.last_name + '</td>';

            bscore += '<td>' +
                value.experian + '</td>';

            bscore += '<td>' +
                value.equifax + '</td>';

            bscore += '<td>' +
                value.transunion + '</td>';

            bscore += '<td>' +
                value.created_at + '</td>';

            bscore += '</tr>';
        }
    });
    //INSERTING ROWS INTO TABLE 
    $('#personal-credit-scores').append(bscore);

}



// //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>30-12-2021<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<


// let trialValue = "";
// userDropdownValue.addEventListener("change",function(){
//     trialValue = parseInt(this.value);
// });

//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>3-1-2022<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<


//>>>>>>>>>>>>>>>this is the codde for the export function for the excel starts here<<<<<<<<<<<<<<<<<<<<<

// let type = ''
// let userDropdownValue = document.getElementById('formTopDropdown');
// userDropdownValue.addEventListener('change', function () {
//     type = this.value;
//     $.ajax({
//         type: "GET",
//         url: `${apiBaseURL}/FilterUserData/${type}`,
//         contentType: "application/json",
//         success: function (response) {
//             $('#user-list-table tbody').empty();
//             var data = response.data;
//             if (data && response.status == 1) {
//                 // console.log(data)
//                 localStorage.setItem("FilterUserData", JSON.stringify(data))
//                 loadUsersInTable(data);
//                 firstPagePagination()
//             } else {
//                 showErrorNotification();
//             }
//         },
//         error: function (xhr, status, error) {
//             showErrorNotification();
//        //      console.log(error);
//         },
//     });
// })


//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>4-1-2022<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
// function progressBar(progressVal,totalPercentageVal = 100) {
//     var strokeVal = (4.64 * 100) /  totalPercentageVal;
// 	var x = document.querySelector('.progress-circle-prog');
//     x.style.strokeDasharray = progressVal * (strokeVal) + ' 999';
// 	var el = document.querySelector('.progress-text');
// 	var from = $('.progress-text').data('progress-one');
// 	$('.progress-text').data('progress-one', progressVal);
// 	var start = new Date().getTime();

// 	setTimeout(function() {
// 	    var now = (new Date().getTime()) - start;
// 	    var progress = now / 700;
// 	    el.innerHTML = progressVal / totalPercentageVal * 100 + '%';
// 	    if (progress < 1) setTimeout(arguments.callee, 10);
// 	}, 10);

// }

// progressBar(50,100);


//==============User Subscription=====================


$("#search-business-button").click(function (e) {

    if ($("#business-name").val() == 0) {

        swal({

            title: '',

            text: "Please fill the Business Name"

        })

    } else {

        let companyName = $('#business-name').val();
        let partnerID = $('#partner-id').val();

        location.href = `${baseURL}report/search_report/${partnerID}/${companyName}`;

    }

});