<style>
    /* Style the form */
    #regForm {
        background-color: #ffffff;
        margin: 0 auto;
        padding: 40px;
        width: 70%;
        min-width: 300px;
    }

    /* Style the input fields */
    input {
        width: 100%;
        font-size: 14px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        border-radius: 4px;
    }

    /*************style for the select tab **************/
    .select-box {
        width: 100%;
        font-size: 14px;
        font-family: Raleway;
        border: 1px solid #aaaaaa !important;
        height: 31px !important;
        padding: 0 5px !important;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #04AA6D;
    }

    /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>1-03-2022<<<<<<<<<<<<<<<<<<<<<<<<<*/
    .input-tab-row {
        display: flex;
    }

    .input-tab-row p {
        flex: 1;
        margin-left: 5px;
        margin-right: 5px;
    }

    /*****************************styling of the input label****************************/
    label {
        font-size: 12px;
    }
</style>

<form id="regForm" enctype="multipart/form-data">
    <!-- One "tab" for each step in the form: -->

    <!-- form first page  -->

    <div class="tab first-page">
        <div>General Customer Information</div>
        <div class="input-tab-row">
            <p>
                <label for="">Business Name</label>
                <input type="text" id="partnerBusinessName" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Tax ID</label>
                <input type="text"  class="numbersOnly" id="partnerTaxID" placeholder="" oninput="this.className = ''" >
            </p>
            <p>
                <label for="">Date Incorporated</label>
                <input id="partnerDateIncorporated" type="date" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Business Type</label>
                <select id="partnerBusinessType" class="select-box" placeholder="Date of Birth" oninput="this.className = ''">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Business Address</label>
                <input type="text" id="partnerBusinessAddress" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Street2</label>
                <input type="text" id="partnerStreet2" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">City</label>
                <input type="text" id="partnerGeneralInformationCity" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">State</label>
                <select id="partnerGeneralInformationState" class="select-box" placeholder="State" oninput="this.className = ''">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </p>
            <p>
                <label for="">Zip</label>
                <input type="text" id="partnerGeneralInformationZip" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Website</label>
                <input type="text" id="partnerWebsite" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">SIC/NAICS Code</label>
                <input type="text" id="partnerSIC" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Ownership</label>
                <input type="text" id="partnerOwnership" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Description of Business</label>
                <textarea id="partnerBusinessDescription" name="" id="" cols="40" rows="1"></textarea>
            </p>
            <p>
                <label for="">EIN Letter</label>
                <input id="partnerEIN" type="file" accept=".pdf,.jpeg,.jpg,.png,.xlsx,.doc,.docx" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Articles of Incorporation/Organization</label>
                <input id="partnerIncorporationArticles" accept=".pdf,.jpeg,.jpg,.png,.xlsx,.doc,.docx" type="file" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Business Phone</label>
                <input type="text" id="partnerBusinessPhone" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Customer Support Email</label>
                <input type="text" id="partnerCustomerSupportEmail" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Business Fax</label>
                <input type="text" id="partnerBusinessFax" placeholder="" oninput="this.className = ''">
            </p>
        </div>
    </div>

    <!-- form second page  -->

    <div class="tab">
        <div> Requested Services, Billing and Payment Terms</div>
        <div class="input-tab-row">
            <p>
                <label for="">Initial Credit Limit/Security Deposit</label>
                <input type="text" id="partnerInitialCreditLimit" placeholder="Number only no dashes" oninput="this.className = ''">
            </p>
        </div>
        <div class="input-tab-row">
            <p>
                <label for="">Desired Services</label>
                <input id="partnerMonitoring" type="radio" name="desire_Service" value="Monitoring">
                <label for="partnerMonitoring">Monitoring</label><br>
                <input id="partnerMerchant" type="radio" name="desire_Service" value="Merchant">
                <label for="partnerMerchant">Free Merchant Account/Payment Processing</label><br>
            </p>
        </div>
    </div>

    <!-- form third page -->

    <div class="tab">
        <div>Bank Information (To be used for payments via ACH Debit initiated by Trak Technologies)</div>
        <div class="input-tab-row">
            <p>
                <label for="">Bank Name</label>
                <input type="text" id="partnerBankInformationBankName" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Bank Phone</label>
                <input type="text" id="partnerBankInformationBankPhone" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Name on Checking Account</label>
                <input type="text" id="partnerBankInformationCheckingAccountName" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Routing Number</label>
                <input type="text" id="partnerBankInformationRoutingNumber" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Verify Routing Number</label>
                <input type="text" id="partnerBankInformationVerifyRoutingNumber" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Account Number</label>
                <input type="text" id="partnerBankInformationAccountNumber" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Verify Account Number</label>
                <input type="text" id="partnerBankInformationVerifyAccountNumber" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">1st Most Recent Bank Statement</label>
                <input id="partnerBankInformationRecentBankStatement" accept=".pdf,.jpeg,.jpg,.png,.xlsx,.doc,.docx" type="file" placeholder="" oninput="this.className = ''">
            </p>
        </div>
    </div>

    <!-- form forth page  -->

    <div class="tab">
        <div> Ownership and Principals Information</div>
        <div class="input-tab-row">
            <p>
                <label for="">First name</label>
                <input type="text" id="partnerCustomerInformationFirstName" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Last name</label>
                <input type="text" id="partnerCustomerInformationLastName" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Home Address</label>
                <input type="text" id="partnerCustomerInformationHomeAddress" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Home street2</label>
                <input type="text" id="partnerCustomerInformationHomeStreet2" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">State</label>
                <input id="partnerCustomerInformationState" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">City</label>
                <input type="text" id="partnerCustomerInformationCity" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Zip</label>
                <input type="text" id="partnercustomerInformationZip" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Percent Ownership</label>
                <input type="text" id="partnerCustomerInformationPercentOwnership" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Driving License Number</label>
                <input type="text" id="partnerCustomerInformationDrivingLicenseNumber" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Drivers License Date of Issuance</label>
                <input type="date" id="partnerCustomerInformationLicenseDate" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Date of Birth</label>
                <input type="date" id="partnerCustomerInformationDOB" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">SSN</label>
                <input type="text" id="partnerCustomerInformationSSN" placeholder="" oninput="this.className = ''">
            </p>
        </div>
        <div class="input-tab-row">
            <p>
                <label for="">SSN Card</label>
                <input id="partnerCustomerInformationSSNCard" accept=".pdf,.jpeg,.jpg,.png" type="file" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Drivers License (Front)</label>
                <input id="partnerCustomerInformationLicenseFront" accept=".pdf,.jpeg,.jpg,.png" type="file" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Drivers License (Back)</label>
                <input id="partnerCustomerInformationLicenseBack" accept=".pdf,.jpeg,.jpg,.png" type="file" placeholder="" oninput="this.className = ''">
            </p>
        </div>
        <div>
            <p>
                <label for="">Terms & Conditions</label>
                <input id="partnerTermsConditions" type="checkbox" placeholder="" oninput="this.className = ''">
            </p>
            <p>
                <label for="">Credit Authorization Policy</label>
                <input id="partnerCreditAutorizationPolicy" type="checkbox" placeholder="" oninput="this.className = ''">
            </p>
        </div>

    </div>

    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>

    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>

</form>
<script>
    // ------------step-wizard-------------
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";

        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        // if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            // collect the data on submit 
            document.getElementById("nextBtn").addEventListener("click", partnerDataUpload());
            //...the form gets submitted:
            // document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    // function validateForm() {
    //     // This function deals with validation of the form fields
    //     var x, y, i, valid = true;
    //     x = document.getElementsByClassName("tab");
    //     y = x[currentTab].getElementsByTagName("input");
    //     // A loop that checks every input field in the current tab:
    //     for (i = 0; i < y.length; i++) {
    //         // If a field is empty...
    //         if (y[i].value == "") {
    //             // add an "invalid" class to the field:
    //             y[i].className += " invalid";
    //             // and set the current valid status to false:
    //             valid = false;
    //         }
    //     }
    //     // If the valid status is true, mark the step as finished and valid:
    //     if (valid) {
    //         document.getElementsByClassName("step")[currentTab].className += " finish";
    //     }
    //     return valid; // return the valid status
    // }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }

    function gettingFormData() {
        let partnerBusinessCapitalApplicationForm = {
            "partnerBusinessName": document.querySelector("#partnerBusinessName").value,
            "partnerTaxID": document.querySelector("#partnerTaxID").value,
            "partnerDateIncorporated": document.querySelector("#partnerDateIncorporated").value,
            "partnerBusinessType": document.querySelector("#partnerBusinessType").value,
            "partnerBusinessAddress": document.querySelector("#partnerBusinessAddress").value,
            "partnerStreet2": document.querySelector("#partnerStreet2").value,
            "partnerGeneralInformationCity": document.querySelector("#partnerGeneralInformationCity").value,
            "partnerGeneralInformationState": document.querySelector("#partnerGeneralInformationState").value,
            "partnerGeneralInformationZip": document.querySelector("#partnerGeneralInformationZip").value,
            "partnerWebsite": document.querySelector("#partnerWebsite").value,
            "partnerSIC": document.querySelector("#partnerSIC").value,
            "partnerOwnership": document.querySelector("#partnerOwnership").value,
            "partnerBusinessDescription": document.querySelector("#partnerBusinessDescription").value,
            "partnerBusinessPhone": document.querySelector("#partnerBusinessPhone").value,
            "partnerCustomerSupportEmail": document.querySelector("#partnerCustomerSupportEmail").value,
            "partnerBusinessFax": document.querySelector("#partnerBusinessFax").value,
            "partnerInitialCreditLimit": document.querySelector("#partnerInitialCreditLimit").value,
            "partnerMerchantOrMonitoring": document.querySelector('input[name="desire_Service"]:checked').value,
            "partnerBankInformationBankName": document.querySelector("#partnerBankInformationBankName").value,
            "partnerBankInformationBankPhone": document.querySelector("#partnerBankInformationBankPhone").value,
            "partnerBankInformationCheckingAccountName": document.querySelector("#partnerBankInformationCheckingAccountName").value,
            "partnerBankInformationRoutingNumber": document.querySelector("#partnerBankInformationRoutingNumber").value,
            "partnerBankInformationVerifyRoutingNumber": document.querySelector("#partnerBankInformationVerifyRoutingNumber").value,
            "partnerBankInformationAccountNumber": document.querySelector("#partnerBankInformationAccountNumber").value,
            "partnerBankInformationVerifyAccountNumber": document.querySelector("#partnerBankInformationVerifyAccountNumber").value,
            "partnerCustomerInformationFirstName": document.querySelector("#partnerCustomerInformationFirstName").value,
            "partnerCustomerInformationLastName": document.querySelector("#partnerCustomerInformationLastName").value,
            "partnerCustomerInformationHomeAddress": document.querySelector("#partnerCustomerInformationHomeAddress").value,
            "partnerCustomerInformationHomeStreet2": document.querySelector("#partnerCustomerInformationHomeStreet2").value,
            "partnerCustomerInformationState": document.querySelector("#partnerCustomerInformationState").value,
            "partnerCustomerInformationCity": document.querySelector("#partnerCustomerInformationCity").value,
            "partnercustomerInformationZip": document.querySelector("#partnercustomerInformationZip").value,
            "partnerCustomerInformationPercentOwnership": document.querySelector("#partnerCustomerInformationPercentOwnership").value,
            "partnerCustomerInformationDrivingLicenseNumber": document.querySelector("#partnerCustomerInformationDrivingLicenseNumber").value,
            "partnerCustomerInformationLicenseDate": document.querySelector("#partnerCustomerInformationLicenseDate").value,
            "partnerCustomerInformationDOB": document.querySelector("#partnerCustomerInformationDOB").value,
            "partnerCustomerInformationSSN": document.querySelector("#partnerCustomerInformationSSN").value,
            "partnerTermsConditions": document.querySelector("#partnerTermsConditions").checked,
            "partnerCreditAutorizationPolicy": document.querySelector("#partnerCreditAutorizationPolicy").checked
        };
        return partnerBusinessCapitalApplicationForm;
    }


    const partnerDataUpload = event => {
        const ein_letter = document.querySelector("#partnerEIN").files
        const articles = document.querySelector("#partnerIncorporationArticles").files
        const bank_statement = document.querySelector("#partnerBankInformationRecentBankStatement").files
        const ssn_card = document.querySelector("#partnerCustomerInformationSSNCard").files
        const dl_front = document.querySelector("#partnerCustomerInformationLicenseFront").files
        const dl_back = document.querySelector("#partnerCustomerInformationLicenseBack").files
        const formData = new FormData()
        formData.append('ein_letter', ein_letter[0])
        formData.append('articles', articles[0])
        formData.append('bank_statement', bank_statement[0])
        formData.append('ssn_card', ssn_card[0])
        formData.append('dl_front', dl_front[0])
        formData.append('dl_back', dl_back[0])

        fetch('https://artechnity.in/track/index.php/api/zapierData', {
                method: 'POST',
                headers: {
                    'data': JSON.stringify(gettingFormData())
                },
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data)
            })
            .catch(error => {
                console.error(error)
            })
    }

  
//>>>>>>>>>>>>>>>>>>>>>>>>>>>>this code is for the only number validation <<<<<<<<<<<<<<<<<<<<<<<<<<<<


    document.querySelectorAll(".numbersOnly").forEach(item =>{

        item.addEventListener("keypress", input =>{
            let regEx = /^[0-9]+$/;
            if(regEx.test(input.key)){
                return true;
            }
            input.preventDefault();
            return false;
        })
    })

    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>this code is for the input length <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    console.log("hello")

</script>