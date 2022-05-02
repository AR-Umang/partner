
if(document.querySelectorAll('.show-first-last-digit').length > 0){
    var showHideDigit = document.querySelectorAll('.show-first-last-digit');
    var ssnNumberEye = document.querySelector('.ssnNumber-Eye');
    var dLicenseEye = document.querySelector('.dLicense-Eye');
    var einNumberEye = document.querySelector('.einNumber-Eye');


    for (var i = 0; i < showHideDigit.length; i++) {
        var ssnNumber = showHideDigit[0].innerText;
        var dLicense = showHideDigit[1].innerText;
        var einNumber = showHideDigit[2].innerText;
    }

    var ssnNumberStar = ssnNumber.replace(ssnNumber.substring(1, 10), "*******");
    var dLicenseStar = dLicense.replace(dLicense.substring(1, 7), "******");
    var einNumberStar = einNumber.replace(einNumber.substring(1, 9), "*******");

    window.addEventListener('load', () => {
        showHideDigit[0].innerText = ssnNumberStar;
        var ssnCounter = 0;
        ssnNumberEye.addEventListener('click', () => {
            if (ssnCounter % 2 == 0) {
                showHideDigit[0].innerText = ssnNumber;
                ssnNumberEye.classList.add("fa-eye-slash");
                ssnNumberEye.classList.remove("fa-eye");
                ssnCounter++;

            } else {
                showHideDigit[0].innerText = ssnNumberStar;
                ssnNumberEye.classList.remove("fa-eye-slash");
                ssnNumberEye.classList.add("fa-eye");
                ssnCounter++;
            }
        });
    })

    window.addEventListener('load', () => {
        showHideDigit[1].innerText = dLicenseStar;
        var dLicenseCounter = 0;
        dLicenseEye.addEventListener('click', () => {
            if (dLicenseCounter % 2 == 0) {
                showHideDigit[1].innerText = dLicense;
                dLicenseEye.classList.add("fa-eye-slash");
                dLicenseEye.classList.remove("fa-eye");
                dLicenseCounter++;

            } else {
                showHideDigit[1].innerText = dLicenseStar;
                dLicenseEye.classList.remove("fa-eye-slash");
                dLicenseEye.classList.add("fa-eye");
                dLicenseCounter++;
            }
        });
    })


    window.addEventListener('load', () => {
        showHideDigit[2].innerText = einNumberStar;
        var einNumberCounter = 0;
        einNumberEye.addEventListener('click', () => {
            if (einNumberCounter % 2 == 0) {
                showHideDigit[2].innerText = einNumber;
                einNumberEye.classList.add("fa-eye-slash");
                einNumberEye.classList.remove("fa-eye");
                einNumberCounter++;

            } else {
                showHideDigit[2].innerText = einNumberStar;
                einNumberEye.classList.remove("fa-eye-slash");
                einNumberEye.classList.add("fa-eye");
                einNumberCounter++;
            }
        });
    })
}

function fetchUsers(type = null) {
    $.ajax({
        type: "GET",
        url: `${apiBaseURL}/users`,
        contentType: "application/json",
        success: function (response) {
            var data = response.data;

            if (data && response.status == 1) {
                localStorage.setItem("FilterUserData", JSON.stringify(data))
                if (type) {
                    loadSubscriptionUsersInTable(data)
                    userTablePagination()
                } else {
                    loadUsersInTable(data);
                    userTablePagination()
                    loadUsersInTableExport(data)

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

function loadUsersInTable(data) {
    var user = '';
    $.each(data, function (key, value) {

        //CONSTRUCTION OF ROWS HAVING
        // DATA FROM JSON OBJECT
        //=================Trial User=========================
        if (value.free_trial > 0 && value.subscription_id < 1) {
            user += `<tr id="${value.ID}" class="user-table-row trial-user-class" style="background:#d3e37a">`;
        }
        //=================Churn User=========================
        else if (value.free_trial == 0 && value.subscription_id == null) {
            user += `<tr id="${value.ID}" class="user-table-row" style="background:#fbfc95;">`;
        }
        //=================Paid User=========================
        else if (value.free_trial == 0 && value.subscription_id != null) {
            user += `<tr id="${value.ID}" class="user-table-row"  style="background:#b4f681">`;
        }
        //=================Pay As You Go User=========================
        else if (value.pay_as_you_go == 1) {
            user += `<tr id="${value.ID}" class="table-danger user-table-row" style="background:#98e8fa">`;
        }
        //=================Deleted User=========================
        else if (value.status == 3) {
            user += `<tr id="${value.ID}" class="table-danger user-table-row" style="background:c9c9c9">`;
        }
        //=================Suspended=========================
        else if (value.status == 1) {
            user += `<tr id="${value.ID}" class="table-danger user-table-row">`;
        }
        //=================Free Trial User=========================
        else {
            user += `<tr id="${value.ID}" class="user-table-row">`;
        }
        var status = '';
        if (value.status == 0) {
            status = 'Active';
        } else if (value.status == 1) {
            status = 'Suspended'
        } else if (value.status == 3) {
            status = 'Deleted';
        }
        // user += `<td><input class="inside-table-checkbox" type="checkbox" id=tableCheckboxID-${value.ID} onchange="insideCheckoxFunction(this.id)"></td>`
        user += '<td onclick="viewUserProfile(' + value.ID + ')" style="cursor:pointer">' +
            value.first_name + ' ' + value.last_name + '</td>';

        user += '<td>' +
            value.phone + '</td>';

        user += '<td>' +
            value.email + '</td>';

        user += '<td>' +
            status + '</td>';


        user += `<td class="user-three-dots-menu-td">
                    <div class="user-dropdown">
                    <i class="material-icons user-three-dots-menu" id="id-${value.ID}" onClick="userThreeDotsDropdownFunction(this.id)">more_vert</i>
                        <div id="userThreeDotsDropdown" class="user-three-dots-dropdown">
                            <a onclick="viewUserProfile(${value.ID})" href="javascript:void(0)" id="${value.ID}"><i class="ri-eye-line" title="View User" style="color:blue"></i></a>
                            <a href="javascript:void(0)" id="${value.ID}"><i class="ri-pencil-line" title="Edit User" style="color:green"></i></a>
                            <a href="javascript:void(0)" id="${value.ID}" onclick="userAccountStatus(this.id)"><i class="ri-indeterminate-circle-line" style="color:red" title="User Account Status"></i></a>
                        </div>
                    </div>
                </td>`;

        user += '</tr>';
    });
    //INSERTING ROWS INTO TABLE 
    $('#user-list-table').append(user);

}


function userThreeDotsDropdownFunction(elementID) {
    document.getElementById(elementID).nextElementSibling.classList.toggle('show');
}

window.onclick = function (event) {
    if (!event.target.matches('.user-three-dots-menu')) {
        var dropdowns = document.getElementsByClassName("user-three-dots-dropdown");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function loadSubscriptionUsersInTable(data) {
    var user = '';
    $.each(data, function (key, value) {

        //CONSTRUCTION OF ROWS HAVING
        // DATA FROM JSON OBJECT
        if (value.subscription_id) {
            user += '<tr class="user-table-row">';
            user += '<td>TRAK Membership Subscription</td>';

            user += '<td>94</td>';

            user += '<td>' +
                value.first_name + ' ' + value.last_name + '</td>';

            user += '<td>Active</td>';

            user += '<td>' +
                value.subs_startDate + '</td>';

            user += '</tr>';
        }
    });
    //INSERTING ROWS INTO TABLE 
    $('#credit-monitoring-subscription').append(user);

}

function viewUserProfile(event) {
    swal({
        title: 'User Profile',
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
                window.location.replace(baseURL + 'users/view/' + event);
            }
        });
}

function fetchSingleUsers(id) {
    $.ajax({
        type: "GET",
        url: `${apiBaseURL}/user/${id}`,
        contentType: "application/json",
        success: function (response) {
            var data = response.data;
            if (data && response.status == 1) {
                loadUsersInTable(data);
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

if (document.body.classList.contains('subscription-reset-btn')) {
    let newCardHideShowBtn = document.getElementById('newCardHideShowBtn');
    let newCardForm = document.getElementById('new-card-form');
    let subResetBtn = document.querySelector('.subscription-reset-btn');
    let cardNumberLimit = document.querySelector('.card-number-limit');
    let cvvNumberLimit = document.querySelector('.cvv-number-limit');
    // console.log(newCardHideShowBtn.innerHTML);



    newCardHideShowBtn.addEventListener('click', function () {
        newCardForm.classList.toggle('active');
        subResetBtn.classList.toggle('active');
        console.log('jdshushusdh');
    });

    window.onload = function () {
        let currentYear = (new Date()).getFullYear();
        let twoDigitYear = currentYear.toString().substr(-2);
        for (let i = 1; i <= 10; i++) {
            let formControlYear = document.querySelector('.custom-form-control-year');
            let option = document.createElement("OPTION");
            option.innerHTML = twoDigitYear++;
            //      console.log(formControlYear.appendChild(option));
            formControlYear.appendChild(option);
        }

    }


    subResetBtn.addEventListener('click', function () {
        document.getElementById('card-validate').value = "";
        document.getElementById('cvv-validate').value = "";
        newCardForm.classList.toggle('active');
        subResetBtn.classList.toggle('active');
        let formControlMonth = document.querySelector('.custom-form-control-month');
        formControlMonth.selectedIndex = 0;
        let formControlYear = document.querySelector('.custom-form-control-year');
        formControlYear.selectedIndex = 0;
        let cvvValidateValue = document.getElementById('cvv-validate');
        cvvValidateValue.style.border = "none";
        let cardValidateValue = document.getElementById('card-validate');
        cardValidateValue.style.border = "none";

    });

    function checkNumber(e) {
        let cardValidateValue = document.getElementById('card-validate');
        let key = window.event ? e.keyCode : e.which;
        let keychar = String.fromCharCode(key);
        let cardAlertMsg = document.querySelector('.card-alert-msg');
        reg = /\d/;
        let result = reg.test(keychar);
        if (!result) {
            cardValidateValue.style.border = "2px solid red";
            // cardAlertMsg.innerHTML = "numbers only";
            return false;
        }
        else {
            cardValidateValue.style.border = "none";
            cardAlertMsg.innerHTML = "";
            return true;
        }
    }

    function checkCvv(e) {
        let cvvValidateValue = document.getElementById('cvv-validate');
        let key = window.event ? e.keyCode : e.which;
        let keychar = String.fromCharCode(key);
        let cvvAlertMsg = document.querySelector('.cvv-alert-msg');
        reg = /\d/;
        let result = reg.test(keychar);
        if (!result) {
            cvvValidateValue.style.border = "2px solid red";
            // cvvAlertMsg.innerHTML = "numbers only";
            return false;
        }
        else {
            cvvValidateValue.style.border = "none";
            cvvAlertMsg.innerHTML = "";
            return true;
        }
    }
}


document.getElementById("excelButton").addEventListener("click", function () {
    // console.log(JSON.parse(localStorage.getItem("FilterUserData")))
    let pageIndex = parseInt(document.getElementById("pageNumber").innerHTML);
    // console.log(pageIndex)
    let dataValue = JSON.parse(localStorage.getItem("FilterUserData"))
    let userExportExcelArray = [];
    let lowerIndex = pageIndex * limitPerPage - limitPerPage;
    let upperIndex = pageIndex * limitPerPage - 1;

    if (upperIndex >= dataValue.length) {
        upperIndex = dataValue.length - 1;
    }


    for (let i = lowerIndex; i <= upperIndex; i++) {
        let value = dataValue[i];
        let userExportExcel = {
            "FullName": value.first_name + " " + value.last_name,
            "UserId": value.ID,
            "Email": value.email,
            "Phone": value.phone,
            "Address": value.address,
            "LastLogin": value.last_login,
            "status": value.status,
            "RegistrationDate": value.created_at
        }
        userExportExcelArray.push(userExportExcel);
    }
    downloadExcelData(executeExcelData(userExportExcelArray));
    // console.log(executeExcelData(userExportExcelArray))

});


function executeExcelData(data) {
    const csvRows = [];
    // get the headers 
    const headers = Object.keys(data[0]);
    csvRows.push(headers.join(','));

    // loop over the rows
    for (const row of data) {
        const values = headers.map(headers => {
            const escaped = ('' + row[headers]).replace(/"/g, '\\"');
            return `"${escaped}"`;
        });
        csvRows.push(values.join(','));
    }
    // form escaped comma seperated values
    return csvRows.join('\n')
}

function downloadExcelData(data) {
    if (type == 0) {
        type = "AllUsers";
    } else if (type == 1) {
        type = "Trial";
    } else if (type == 2) {
        type = "Paid";
    } else if (type == 3) {
        type = "Churn";
    } else if (type == 4) {
        type = "PayAsYouGo";
    } else if (type == 5) {
        type = "Suspended";
    } else {
        type = "Deleted";
    }
    let date = new Date().toISOString().split('T')[0];
    const blob = new Blob([data], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.setAttribute("hidden", '');
    a.setAttribute("href", url);
    a.setAttribute("download", `${type}_${date}.csv`);
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
};

function userAccountStatus(elm) {
    userID = elm;
    $("#userID").val(userID);
    $('#exampleModal').modal('show');
}

$("#user-account-status").on("click", function (e) {
    e.preventDefault();
    let userID = $('#userID').val();
    let status = $('#userStatus').val();
    console.log(userID, status);
    UserStatus(userID, status);
});

function UserStatus(id, status) {
    $.ajax({
        type: "POST",
        url: `${apiBaseURL}/UpdateUserStatus`,
        contentType: "application/json",
        data: JSON.stringify({ 'user_id': id, 'status': status }),
        success: function (response) {
            console.log(response);
            if (response.status == 1) {
                showSuccessNotification(response.message);
                setTimeout(
                    location.href = baseURL + 'users',
                    10000);
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