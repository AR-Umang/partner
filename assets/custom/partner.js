$(".number-input").on("keypress", function (e) {
    const key = e.which || e.keyCode;
    if (!(key >= 48 && key <= 57)) {
        e.preventDefault();
    }
});

$("#PostalCode").on("keypress", function (e) {
    const key = e.which || e.keyCode;
    if (!(key >= 48 && key <= 57)) {
        e.preventDefault();
    }
});

//================================Partner CRUD ========================================
$("#partnerAdd").on("click", function (e) {
    e.preventDefault();
    // $("#edit-partner-form").trigger("submit");
    submitUpdatepartnerDetailsForm(e, this);
});
// $("#edit-partner-form-submit-button").on("click", function (e) {
//     e.preventDefault();
//     $("#edit-partner-form").trigger("submit");
// });
// $("#edit-partner-form").submit(function (e) {
//     e.preventDefault();
//     submitUpdatepartnerDetailsForm(e, this);
// });

function submitUpdatepartnerDetailsForm(e, formElement) {
    e.preventDefault();
    var loggedInuser = getLoggedInPartner();
    if (!loggedInuser) {
        alert("Your session has expired, please login to continue");
        location.href = baseURL;
        return;
    }

    // var partnerId = $.AdminBSB.partnerToEdit.ID
    // if (!partnerId) {
    //     return showErrorNotification()
    // }

    var data = {
        firstName: $("#fname").val(),
        lastName: $("#lname").val(),
        emailAddress: $("#email").val(),
        phoneNumber: $("#mobnoPartner").val(),
        address: $("#streetAdd").val(),
        city: $("#city").val(),
        state: $("#state").val(),
        country: $("#country").val(),
        postcode: $("#postalCode").val(),
        businessName: $('#businessName').val(),
        apiPrice: $('#apiPrice').val()
    };

    var error = [];
    if (!data.businessName) error.push("<li>Business name is required</l1>");
    if (!data.address) error.push("<li>Business address is required</l1>");
    if (!data.postcode) error.push("<li>Postal Code is required</l1>");
    if (!data.city) error.push("<li>City is required</l1>");
    if (!data.state) error.push("<li>State is required</l1>");
    if (!data.firstName) error.push("<li>First name is required</l1>");
    if (!data.lastName) error.push("<li>Last name is required</l1>");
    if (!data.apiPrice) error.push("<li>API Price is required</l1>");
    if (!data.phoneNumber) error.push("<li>Phone number is required</l1>");
    else if (!isValidPhoneNumber(data.phoneNumber)) {
        error.push("<li>Phone number is invalid</l1>");
    }
    if (!data.emailAddress) error.push("<li>Email address is required</l1>");
    if (!isValidEmail(data.emailAddress)) {
        error.push("<li>Email address is invalid</l1>");
    }


    if (error.length > 0) {
        return swal({
            title: "Please fill all required fields",
            text: `<ul>${error.join("\n")}</ul>`,
            html: true,
        });
    }

    $(".page-loader-wrapper").show();

    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/partnerAdd`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            $(".page-loader-wrapper").hide();
            var data = response.data;
            if (data && response.status == 1) {
                showSuccessNotification(response.message)
                setTimeout(function () {
                    window.location.href = data.redirectUrl;
                }, 3000);
            } else {
                showErrorNotification(response.message);
            }
        },
        error: function (xhr, status, error) {
            $(".page-loader-wrapper").hide();
            showErrorNotification();
            console.log(error);
        },
    });

}

function fetchPartner(type = null) {
    $.ajax({
        type: "GET",
        url: `${apiBaseURL}/partner`,
        contentType: "application/json",
        success: function (response) {
            var data = response.data;
            if (data && response.status == 1) {
                // localStorage.setItem("FilterpartnerData", JSON.stringify(data))
                if (type) {
                    loadPartnerInTable(data)
                    partnerTablePagination()
                } else {
                    loadPartnerInTable(data);
                    partnerTablePagination()
                    loadPartnerInTableExport(data)

                }
            } else {
                showErrorNotification();
            }
        },
        error: function (xhr, status, error) {
            showErrorNotification();
            console.log(error);
        },
    });
}

let limitPerPage = 10;
let currentPage;

function partnerTablePagination() {

    let totalNumberOfpartnerTableRow = $(".partner-table-row").length;
    let limitPerPage = 10;
    $(".partner-table-row:gt(" + (limitPerPage - 1) + ")").hide();
    let totalNumberOfPages = Math.ceil(totalNumberOfpartnerTableRow / limitPerPage);
    let currentPage = 1;

    // this is the pagination part 
    $(".partner-table-pagination").append(`<li class="page-item" id="prevButton"><a class="page-link" href="javascript:void(0)">Prev</a></li>`)

    $(".partner-table-pagination").append(`<li class="page-item active current-page"><a class="page-link" href="javascript:void(0)" id="pageNumber">1</a></li>`)


    $(".partner-table-pagination").append(`<li class="page-item" id="nextButton"><a class="page-link" href="javascript:void(0)">Next</a></li>`)


    $(".partner-table-pagination li#nextButton").on("click", function () {

        if (totalNumberOfPages === currentPage) {
            return false;
        } else {
            currentPage++;
            $("#pageNumber").text(`${currentPage}`);
            $(".partner-table-row").hide();
            let grandTotal = limitPerPage * currentPage;
            for (let i = grandTotal - limitPerPage; i < grandTotal; i++) {
                $(".partner-table-row:eq(" + i + ")").show()
            }
        }
    })

    $(".partner-table-pagination li#prevButton").on("click", function () {
        if (currentPage === 1) {
            return false;
        } else {
            currentPage--;
            $("#pageNumber").text(`${currentPage}`);
            $(".partner-table-row").hide();
            let grandTotal = limitPerPage * currentPage;
            for (let i = grandTotal - limitPerPage; i < grandTotal; i++) {
                $(".partner-table-row:eq(" + i + ")").show()
            }
        }
    })

}

function firstPagePagination() {
    let totalNumberOfPartnerTableRow = $(".partner-table-row").length;
    let limitPerPage = 10;
    $(".partner-table-row:gt(" + (limitPerPage - 1) + ")").hide();
}

function loadPartnerInTable(data) {
    var partner = '';
    $.each(data, function (key, value) {

        //CONSTRUCTION OF ROWS HAVING
        // DATA FROM JSON OBJECT
        //=================Trial partner=========================
        if (value.free_trial > 0 && value.subscription_id < 1) {
            partner += `<tr id="${value.partner_sr}" class="partner-table-row trial-partner-class" style="background:#d3e37a">`;
        }
        //=================Churn partner=========================
        else if (value.free_trial == 0 && value.subscription_id == null) {
            partner += `<tr id="${value.partner_sr}" class="partner-table-row" style="background:#fbfc95;">`;
        }
        //=================Paid partner=========================
        else if (value.free_trial == 0 && value.subscription_id != null) {
            partner += `<tr id="${value.partner_sr}" class="partner-table-row"  style="background:#b4f681">`;
        }
        //=================Pay As You Go partner=========================
        else if (value.pay_as_you_go == 1) {
            partner += `<tr id="${value.partner_sr}" class="table-danger partner-table-row" style="background:#98e8fa">`;
        }
        //=================Deleted partner=========================
        else if (value.status == 3) {
            partner += `<tr id="${value.partner_sr}" class="table-danger partner-table-row" style="background:c9c9c9">`;
        }
        //=================Suspended=========================
        else if (value.status == 1) {
            partner += `<tr id="${value.partner_sr}" class="table-danger partner-table-row">`;
        }
        //=================Free Trial partner=========================
        else {
            partner += `<tr id="${value.partner_sr}" class="partner-table-row">`;
        }
        var status = '';
        if (value.partner_status == 0) {
            status = 'Active';
        } else if (value.partner_status == 1) {
            status = 'Suspended'
        } else if (value.partner_status == 3) {
            status = 'Deleted';
        }
        // partner += `<td><input class="inside-table-checkbox" type="checkbox" id=tableCheckboxID-${value.ID} onchange="insideCheckoxFunction(this.id)"></td>`
        partner += '<td onclick="viewpartnerProfile('+ value.partner_sr +')" style="cursor:pointer">' +
            value.partner_first_name + ' ' + value.partner_last_name + '</td>';

        partner += '<td>' +
            value.partner_contact + '</td>';

        partner += '<td>' +
            value.partner_email + '</td>';

        partner += '<td>' +
            status + '</td>';


        partner += `<td class="user-three-dots-menu-td">
                    <div class="user-dropdown">
                    <i class="material-icons user-three-dots-menu" id="id-${value.partner_sr}" onClick="userThreeDotsDropdownFunction(this.id)">more_vert</i>
                        <div id="userThreeDotsDropdown" class="user-three-dots-dropdown">
                            <a onclick="viewpartnerProfile(${value.partner_sr})" href="javascript:void(0)" id="${value.partner_sr}"><i class="ri-eye-line" title="View User" style="color:blue"></i></a>
                            <a href="javascript:void(0)" id="${value.partner_sr}"><i class="ri-pencil-line" title="Edit User" style="color:green"></i></a>
                            <a href="javascript:void(0)" id="${value.partner_sr}"><i class="ri-indeterminate-circle-line" style="color:red" title="Partner Account Status"></i></a>
                        </div>
                    </div>
                </td>`;
        // <a href="javascript:void(0)" id="${value.ID}"><i class="ri-pencil-line"></i><span class="text-span">Edit partner</span></a>
        // <a href="javascript:void(0)" id="${value.ID}"><i class="ri-delete-bin-line"></i><span class="text-span">Delete partner</span></a>
        partner += '</tr>';
    });
    //INSERTING ROWS INTO TABLE 
    $('#partner-list-table').append(partner);

}

function userThreeDotsDropdownFunction(elementID) {
    document.getElementById(elementID).nextElementSibling.classList.toggle('show');
}

function viewpartnerProfile(event) {
    swal({
        title: 'Partner Profile',
        text: 'Are you sure?',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Proceed',
        cancelButtonText: 'Cancel',
        closeOnConfirm: false,
        closeOnCancel: true
    },
        function (isConfirm) {
            if (isConfirm) {
                // swal("Shortlisted!", "Candidates are successfully shortlisted!", "success");
                window.location.replace(baseURL + 'partner/view/' + event);
            }
        });
}

let inputTextCopy = document.getElementById("inputTextCopy");
let inputTextCopyValue = inputTextCopy.value;
let copiedTextSpan = document.querySelector('.copiedTextSpan');

// ===============--=================== js code for to copy input field value ===========--====================

function textCopyFunction() {


    copiedTextSpan.style.cssText = 'opacity: 1';

    inputTextCopy.select();
    inputTextCopy.setSelectionRange(0, 99999);

    navigator.clipboard.writeText(inputTextCopyValue);
}

setInterval(function () {
    copiedTextSpan.style.cssText += 'opacity: 0';

}, 4000);

//    ===============--================ js code for to hide show input field value ======--=================

window.onload = () => {
    let inputFieldValue = "";
    for (let i = 0; i < inputTextCopy.value.length; i++) {
        inputFieldValue += "*";
    }
    inputTextCopy.value = inputFieldValue;
}

let inputValueCounterrr = 1;

function showHideText() {

    let inputFieldValue = "";
    for (let i = 0; i < inputTextCopy.value.length; i++) {
        inputFieldValue += "*";
    }

    if (inputValueCounterrr % 2 == 0) {
        inputTextCopy.value = inputFieldValue;
        inputValueCounterrr++;
        slashEyeIcon.classList.remove('fa-eye')
        slashEyeIcon.classList.add('fa-eye-slash')

    } else {
        inputTextCopy.value = inputTextCopyValue;
        inputValueCounterrr++;
        slashEyeIcon.classList.add('fa-eye')
        slashEyeIcon.classList.remove('fa-eye-slash')
    }
}

// console.log('jdfsghfdjuhg');
var xValues = ["Jan", "Feb", "Mar", "Apr", "May"];
var yValues = [2, 3, 4, 5, 4];
var barColors = [, "#FFBD14", "#FFBD14", "#31E6FF", "#FFBD14", "#09CE02", "#09CE02"];

new Chart("historicalTradeInformationChart", {
    data: {
        labels: xValues,
        datasets: [
            {
                type: "bar",
                backgroundColor: barColors,
                data: yValues,
            },
        ]
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            // text: "World Wine Production 2018"
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    display: true,
                    drawOnChartArea: false
                },
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    display: true,
                    drawOnChartArea: false
                },
            }]
        }
    },
});

// =======================Charge History=============================================
function fetchPartnerCharge(id) {
    var data = {
        'partner_id': id
    };
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/partner_chargeHistory`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            var data = response.data;
            if (data && response.status == 1) {
                loadPartnerChargeInTable(data)
                partnerTablePagination()
            }
        },
        error: function (xhr, status, error) {
            showErrorNotification();
            console.log(error);
        },
    });
}

function loadPartnerChargeInTable(data) {
    var charge = '';
    $.each(data, function (key, value) {

        //CONSTRUCTION OF ROWS HAVING

        charge += '<tr class="partner-table-row">';
        charge += '<td>' +
            value.charge_sr + '</td>';

        charge += '<td> $ ' +
            value.charge_amount + '</td>';

        charge += '<td>' +
            value.charge_created_at + '</td>';
        charge += '</tr>';
    });
    //INSERTING ROWS INTO TABLE 
    $('#charge-list-table').append(charge);

}

// =======================CreditSafe History=============================================
function fetchPartnerCreditSafe(id) {
    var data = {
        'partner_id': id
    };
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/partner_creditSafe`,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (response) {
            var data = response.data;
            if (data && response.status == 1) {
                loadPartnerCreditSafeInTable(data)
                partnerTablePagination()
            }
        },
        error: function (xhr, status, error) {
            showErrorNotification();
            console.log(error);
        },
    });
}

function loadPartnerCreditSafeInTable(data) {
    var creditSafe = '';
    $.each(data, function (key, value) {

        //CONSTRUCTION OF ROWS HAVING

        creditSafe += '<tr class="creditSafe-table-row">';
        creditSafe += '<td>' +
            value.request_sr + '</td>';

        creditSafe += '<td><a href="' + baseURL + 'creditsafe/report/' + value.request_partner_id + '/' + value.request_report_id + '">' +
            value.request_report_id + '</a></td>';

        creditSafe += '<td>' +
            value.request_keyword + '</td>';
        creditSafe += '<td>' +
            value.request_created_at + '</td>';
        creditSafe += '</tr>';
    });
    //INSERTING ROWS INTO TABLE 
    $('#creditSafe-list-table').append(creditSafe);

}