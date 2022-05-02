<!--this is material icon cdn-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- this code is for the state  -->
<?php
$us_state_options = '<option value="">Select State</option>';
foreach (US_STATE_CODE_TO_NAMES as $code => $name) {
    $us_state_options .= '<option value="' . $code . '">' . $name . '</option>';
}
?>

<!-- this code is for the sic code  -->
<?php
$sic_code = '<option value="">Select SIC Code</option>';
foreach ($sic as $row) {
    $sic_code .= '<option value="' . $row['sic_code'] . '">' . $row['industry'] . '</option>';
}
?>


<style>
    /* Style the form */
    #regForm {
        background-color: #ffffff;
        margin: 0 auto;
        padding: 40px;
        width: 90%;
        min-width: 300px;
    }


    /* Style the input fields */
    input {
        width: 100%;
        font-size: 15px;
        font-family: Raleway;
        border: 0.5px solid #09355c;
        border-radius: 4px;
        height: 35px;
        padding-left: 5px;
    }

    /*************style for the select tab **************/
    .select-box {
        width: 100%;
        font-size: 15px;
        font-family: Raleway;
        border: 1px solid #09355c !important;
        height: 35px !important;
        padding: 0 5px !important;
    }

    /* Mark input boxes that gets an error on validation: */
    .invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 35px;
        width: 35px;
        background-color: #fff;
        /* border: 1px solid #000; */
        border-radius: 50%;
        display: inline-block;
        margin-left: 25px;
        margin-right: 25px;
        font-size: 20px;
        font-weight: 600;
    }

    /* Mark the active step: */
    .step.active {
        background: #fd7a01;
        color: #fff;
        font-weight: 600;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #024c95;
        color: #fff;
        font-weight: 600;
    }

    /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>1-03-2022<<<<<<<<<<<<<<<<<<<<<<<<<*/
    .input-tab-row {
        display: flex;
        margin-bottom: 20px;
    }

    .input-tab-row p {
        flex: 1;
        margin-left: 10px;
        margin-right: 10px;
    }

    /*****************************styling of the input label****************************/
    label {
        font-size: 13px;
        color: #09355c;
        font-weight: 600;
    }

    :focus-visible {
        outline: none;
    }

    /*>>>>>>>>>>>>>>>>>>>>>>>>03-03-2022<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
    .widget-credit-card-application__heading {
        font-size: 30px;
        font-weight: 600;
        text-transform: capitalize;
        text-align: center;
        color: #09355c;
        margin-bottom: 25px;
    }

    .widget-credit-card-application__heading::after {
        content: '';
        height: 4px;
        width: 15%;
        background: #fd7a01;
        display: block;
        margin: auto;
        /* margin-top: 5px;
        margin-bottom: 5px; */
    }

    .widget-credit-card-application__heading::before {
        content: '';
        height: 4px;
        width: 25%;
        background: #fd7a01;
        display: block;
        margin: auto;
        /* margin-top: 5px;
        margin-bottom: 5px; */
    }

    ::file-selector-button {
        background: #024c95;
        border: none;
        color: white;
        border: 1px solid #fff;
        margin-top: 2px;
    }

    textarea {
        border: 0.5px solid #09355c;
        height: 35px;
        border-radius: 4px;
        font-size: 15px;
        padding-left: 5px;
        display: block;
        width: 100%;
    }

    button {
        padding: 5px 30px;
        border-radius: 5px;
        background: #024c95;
        color: #fff;
        border: 2px solid #fff;
        font-size: 17px;

    }

    .form-top-part {
        margin-bottom: 20px;
        text-align: center;
        background: #CDDEFF;
        height: 80px;
        position: relative;
        border-radius: 15px;
    }

    .form-top-part>div {
        position: absolute;
        top: 50%;
        left: 0;
        transform: translateY(-50%);
    }

    #prevBtn {
        background: #777777;
    }

    #prevBtn:hover {
        background: #fd7a01;
        transition: 0.4s;
    }

    button:focus {
        border: none;
        outline: none;
    }

    button:hover {
        background: #fd7a01;
        transition: 0.4s;
    }

    .material-icons {
        color: #fff;
    }

    .widget-button__master-div {
        display: flex;
        margin-top: 30px;
    }

    .widget-button__master-div>div {
        margin: auto;
    }

    .widget-credit-card-application__underline {
        width: 20%;
        height: 4px;
        background: #09355c;
        margin-bottom: 30px;
        margin-left: auto;
        margin-right: auto;
    }

    select {
        height: 35px !important;
        padding: 5px 20px 5px 5px;
        border: 0.5px solid #09355c !important;
        appearance: auto;
    }

    input[type=checkbox],
    input[type=radio] {
        height: 17px;
        /* width: 50%; */
        /* margin-top: 20px; */
    }

    .input-tab-row p span {
        color: red;
        font-size: 12px;

    }

    /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>this is the styling for the loader<<<<<<<<<<<<<<<<<<<<<<<<*/

    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>this is the styling for the afterSubmition section>>>>>>>>>>>>>>>>>>>>>*/
    #registrationID {
        background-color: #ffffff;
        margin: 0 auto;
        padding: 40px;
        width: 90%;
        min-width: 300px;
        display: none;
    }

    #registrationID2 {
        background-color: #ffffff;
        margin: 0 auto;
        padding: 40px;
        width: 90%;
        min-width: 300px;
        display: none;
    }


    .afterSubmitBtn {
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: space-around;
        align-items: center;

    }

    .after-submit-heading h1 {
        text-align: center;
        color: #0a365d;
        font-weight: 600;
        font-size: 35px;
        margin-bottom: 100px;
    }

    .registration-label {
        font-size: 28px;
        font-weight: 400;
        color: #0a365d;
    }

    #registration {
        font-size: 30px;
        font-weight: 500;
        color: #000;
    }

    #radioErrorMsg {
        color: red;
        font-size: 12px
    }

    #checkboxErrorMsg {
        color: red;
        font-size: 12px
    }

    #verifyRountingNumberSpan,
    #verifyAccountNumberSpan {
        font-size: 12px;
        color: red;
    }

    .form-top-part__inner-div {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .form__star {
        font-size: 14px;
    }

    #uploadFileBtn {
        background: #024c95;
        font-size: 18px;
        font-weight: 400;
        cursor: pointer;
        color: #fff;
        padding: 8px 15px;
        border-radius: 5px;
        display: flex;
        width: 30%;
        justify-content: center;
        margin: auto;
        margin-bottom: 30px;
        /* margin-top: 30px; */
        text-align: center;
        transition: 0.3s;
    }

    #uploadFileBtn:hover {
        background: #fd7a01;
        transition: 0.3s;
    }

    #uploadIcon {
        margin-right: 15px;
    }

    #backToUploadInsuranceBtn {
        font-size: 18px;
        font-weight: 600;
        margin-left: auto;
        margin-right: 10%;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #024c95;
        padding: 5px 15px;
        border-radius: 5px;
        transition: 0.3s;
    }

    #backToUploadInsuranceBtn:hover {
        background: #fd7a01;
        transition: 0.3s;
    }

    .horizontal__line {
        margin-top: 10px;
        height: 1px;
        background: #024c95;
        margin-bottom: 10px;
    }

    /*>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>this is the responsive part<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
    @media only screen and (max-width:768px) {
        .input-tab-row {
            flex-direction: column;
        }

        #partnerBusinessDescription {
            width: 100%;
        }

        .step {
            font-size: 12px;
            height: 20px;
            width: 20px;
            margin-left: 0;
            margin-right: 0;
        }

        .form-top-part__inner-div {
            justify-content: space-around;
        }

        .form-top-part {
            height: 70px;
            border-radius: 0;
        }

        #regForm {
            width: 100%;
            min-width: 100px;
        }

        #prevBtn {
            width: 100%;
        }

        #nextBtn {
            width: 100%;
        }

        .afterSubmitBtn {
            flex-direction: column;
        }

        .afterSubmitBtn>button {
            width: 100%;
            flex: 1;
        }

        #uploadFileBtn {
            width: 90%;
        }
    }

    @media only screen and (max-width:360px) {
        #regForm {
            padding: 20px;
        }
    }

    /*>>>>>>>>>>>>>>this is the styling for the progress bar in the upload file section<<<<<<<<<<<<<<<<<<<<<<<<<*/
    progress{
        width: 70%;
        height: 15px;
        -webkit-appearance: none;
        border-radius: 5px;
        margin-top: 10px;
    }
    progress::-webkit-progress-bar{
        width: 70%;
        height: 12px;
        background: gray;
    }
    progress::-webkit-progress-value{
        background-color: #fd7a01;
    }
    .common-upload-button{
        margin-top: 10px;
        margin-left: auto;
        padding: 5px 18px;
        border: none;
        background:#024c95;
    }
</style>
<!-- <button id="verifyValue">check</button> -->

<div id="registrationID2">
    <div class="after-submit-heading" >
        <h1 id="registration2"></h1>
    </div>
    <!-- <div style="text-align:center; margin-bottom:100px;"><span class="registration-label"></span><span id="registration2"></span></div> -->
    <div class="afterSubmitBtn">
        <!-- <button id="goToHomeAgain">Go To Home</button>
        <button id="goToFormAgain">Submit Another Application</button> -->
        <button id="goToFormAgain">go back to Home</button>
    </div>
</div>


<div id="registrationID">
    <div class="after-submit-heading">
        <h1>What would you like to do</h1>
    </div>
    <div style="text-align:center; margin-bottom:100px;"><span class="registration-label">Your Application ID is : </span><span id="registration"></span></div>
    <div class="afterSubmitBtn">
        <!-- <button id="goToHomeAgain">Go To Home</button>
        <button id="goToFormAgain">Submit Another Application</button> -->
        <button id="purchanseInsuranceButton" onClick="showInsuranceTab()"> purchase Insurance</button>
    </div>
</div>

<form id="regForm" enctype="multipart/form-data" style="position: relative;">

<div id="loaderID2" style=" background:#fff; width: 100%; height:100%; position:absolute; top:0; left:0; display:none; justify-content:center; align-items:center; flex-direction:column; min-height:300px;">
        <div class="loader"></div>
        <div style="width: 50%; text-align:center; margin-top:30px; font-weight:500; font-size:18px;">Your application is processing, this may take a few minutes. <br><span style="font-weight:600; font-size:22px; color:red"> Do not leave this screen until your application is fully processed </span></div>
    </div>
    <div id="loaderID" style=" background:#fff; width: 100%; height:100%; position:absolute; top:0; left:0; display:none; justify-content:center; align-items:center; flex-direction:column; min-height:300px;">
        <div class="loader"></div>
        <div style="width: 50%; text-align:center; margin-top:30px; font-weight:500; font-size:18px;">Your application is processing, this may take a few minutes. <span style="font-weight:600; font-size:22px; color:red"> Do not leave this screen until your application is fully processed </span> and you receive a confirmation number</div>
    </div>


    <!-- Circles which indicates the steps of the form: -->
    <div class="form-top-part">
        <div class="form-top-part__inner-div">
            <span class="step">1</span>
            <span class="step">2</span>
            <span class="step">3</span>
            <span class="step">4</span>
            <span class="step">5</span>
            <span class="step">6</span>
            <span class="step">7</span>
            <!-- <span class="step">7</span> -->
        </div>
    </div>
    <!-- <div class="widget-credit-card-application__underline"></div> -->
    <!-- One "tab" for each step in the form: -->

    <!-- form first page  -->

    <div class="tab first-page">
        <div class="widget-credit-card-application__heading">General Customer Information (Part -1)</div>
        <div class="input-tab-row">
            <p>
                <label for="">Business Name<span class="form__star">*</span></label>
                <input class="input-field" id="partnerBusinessName" placeholder="" oninput="this.className = 'input-field'">
            </p>
            <p>
                <label for="">Tax ID<span class="form__star">*</span></label>
                <input class="numbersOnly input-field" id="partnerTaxID" placeholder="" oninput="this.className = 'input-field'" maxlength="9">
                <span id="partnerTaxIDSpan"></span>
            </p>
            <p>
                <label for="">Date Incorporated<span class="form__star">*</span></label>
                <input class="input-field" id="partnerDateIncorporated" type="date" placeholder="" oninput="this.className = 'input-field'" max="<?php echo date('Y-m-d'); ?>">
            </p>
            <p>
                <label for="">Business Type<span class="form__star">*</span></label>
                <select id="partnerBusinessType" class="select-box input-field" placeholder="Date of Birth" oninput="this.className = 'input-field'">
                    <option value="" selected>choose your Business Type</option>
                    <option value="LLC">LLC</option>
                    <option value="Corporation">Corporation</option>
                    <option value="Non Profit">Non Profit</option>
                    <option value="sole Proprietor">sole Proprietor</option>
                    <option value="Government">Government</option>
                </select>
            </p>
        </div>


        <div class="input-tab-row">
            <p>
                <label for="">Description of Business<span class="form__star">*</span></label>
                <textarea class="input-field" id="partnerBusinessDescription" name="" cols="40" rows="1" oninput="this.className = 'input-field'"></textarea>
            </p>
            <p>
                <label for="">EIN Letter<span class="form__star">*</span></label>
                <input class="input-field" id="partnerEIN" type="file" accept=".pdf,.jpeg,.jpg,.png,.xlsx,.doc,.docx" placeholder="" oninput="this.className = 'input-field'">
                <progress min="0" max="100" value="0" id="firstProgressBar"></progress>
                <span class="progress-indicator"></span>
                <span></span>
                <button type="button" id="uploadEINLetter" class="common-upload-button">&#8682; Upload</button>
            </p>
            <p>
                <label for="">Articles of Incorporation/Organization<span class="form__star">*</span></label>
                <input class="input-field" id="partnerIncorporationArticles" accept=".pdf,.jpeg,.jpg,.png,.xlsx,.doc,.docx" type="file" placeholder="" oninput="this.className = 'input-field'">
                <span></span>
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Business Phone<span class="form__star">*</span></label>
                <input class="input-field numbersOnly" id="partnerBusinessPhone" placeholder="" oninput="this.className = 'input-field'" maxlength="10">
                <span id="partnerBusinessPhoneSpan"></span>
            </p>
            <p>
                <label for="">Customer Support Email<span class="form__star">*</span></label>
                <input class="input-field emailOnly" id="partnerCustomerSupportEmail" placeholder="" oninput="this.className = 'input-field'">
                <span id="emailCheckingSpan"></span>
            </p>
            <p>
                <label for="">Business Fax</label>
                <input class="numbersOnly" id="partnerBusinessFax" placeholder="" oninput="this.className = ''" maxlength="10">
                <span id="partnerBusinessFaxSpan"></span>
            </p>
        </div>
    </div>

    <!-- form second page  -->

    <div class="tab">
        <div class="widget-credit-card-application__heading">General Customer Information (Part - 2)</div>
        <div class="input-tab-row">
            <p>
                <label for="">Business Address<span class="form__star">*</span></label>
                <input class="input-field" type="text" id="partnerBusinessAddress" placeholder="" oninput="this.className = 'input-field'">
            </p>
            <p>
                <label for="">Street2</label>
                <input class="" id="partnerStreet2" placeholder="" oninput="this.className = ''">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">City<span class="form__star">*</span></label>
                <input class="input-field" id="partnerGeneralInformationCity" placeholder="" oninput="this.className = 'input-field'">
            </p>
            <p>
                <label for="">State<span class="form__star">*</span></label>
                <select id="partnerGeneralInformationState" class="select-box input-field" placeholder="State" oninput="this.className = 'input-field'">
                    <?php echo $us_state_options; ?>
                </select>
            </p>
            <p>
                <label for="">Zip<span class="form__star">*</span></label>
                <input class="input-field numbersOnly" id="partnerGeneralInformationZip" placeholder="" oninput="this.className = 'input-field'" maxlength="5">
                <span id="partnerGeneralInformationZipSpan"></span>
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Website<span class="form__star">*</span></label>
                <input class="input-field websiteOnly" id="partnerWebsite" placeholder="" oninput="this.className = 'input-field'">
                <span id="websiteSpan"></span>
            </p>
            <p>
                <label for="">SIC/NAICS Code<span class="form__star">*</span></label>
                <!-- <input class="input-field" id="partnerSIC" placeholder="" oninput="this.className = ''"> -->
                <select class="input-field" id="partnerSIC" oninput="this.className = 'input-field'">
                    <?php echo $sic_code; ?>
                </select>
            </p>
            <p>
                <label for="">Ownership<span class="form__star">*</span></label>
                <select class="input-field" id="partnerOwnership" placeholder="" oninput="this.className = 'input-field'">
                    <option value="" selected>Select Ownership</option>
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>
            </p>
        </div>

    </div>

    <!-- form third page  -->

    <div class="tab">
        <div class="widget-credit-card-application__heading">Requested Services, Billing and Payment Terms</div>
        <div class="input-tab-row">
            <p>
                <label for="">Initial Credit Limit/Security Deposit<span class="form__star">*</span></label>
                <input class="input-field numbersOnly" id="partnerInitialCreditLimit" placeholder="Number only no dashes" oninput="this.className = 'input-field'">
            </p>
        </div>
    </div>

    <!-- form forth page -->

    <div class="tab">
        <div class="widget-credit-card-application__heading">Bank Information (To be used for payments via ACH Debit initiated by Trak Technologies)</div>
        <div class="input-tab-row">
            <p>
                <label for="">Bank Name<span class="form__star">*</span></label>
                <input class="input-field" id="partnerBankInformationBankName" placeholder="" oninput="this.className = 'input-field'">
            </p>
            <p>
                <label for="">Bank Phone</label>
                <input class="numbersOnly" id="partnerBankInformationBankPhone" placeholder="" oninput="this.className = ''" maxlength="10">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Name on Checking Account<span class="form__star">*</span></label>
                <input class="input-field" id="partnerBankInformationCheckingAccountName" placeholder="" oninput="this.className = 'input-field'">
            </p>
            <p>
                <label for="">1st Most Recent Bank Statement<span class="form__star">*</span></label>
                <input class="input-field" id="partnerBankInformationRecentBankStatement" accept=".pdf,.jpeg,.jpg,.png,.xlsx,.doc,.docx" type="file" placeholder="" oninput="this.className = 'input-field'">
                <span></span>
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Routing Number<span class="form__star">*</span></label>
                <input class="input-field numbersOnly verify" id="partnerBankInformationRoutingNumber" placeholder="" oninput="this.className = 'input-field'" maxlength="9">
                <span id="partnerBankInformationRoutingNumberSpan"></span>
            </p>
            <p>
                <label for="">Verify Routing Number<span class="form__star">*</span></label>
                <input class="input-field numbersOnly verify" id="partnerBankInformationVerifyRoutingNumber" placeholder="" oninput="this.className = 'input-field'" maxlength="9">
                <span id="verifyRountingNumberSpan"></span>
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Account Number<span class="form__star">*</span></label>
                <input class="input-field  verify" id="partnerBankInformationAccountNumber" placeholder="" oninput="this.className = 'input-field'">
                <span id="partnerBankInformationAccountNumberSpan"></span>
            </p>
            <p>
                <label for="">Verify Account Number<span class="form__star">*</span></label>
                <input class="input-field verify" id="partnerBankInformationVerifyAccountNumber" placeholder="" oninput="this.className = 'input-field'">
                <span id="verifyAccountNumberSpan"></span>
            </p>
        </div>
    </div>

    <!-- form fifth page  -->

    <div class="tab">
        <div class="widget-credit-card-application__heading">Ownership and Principals Information (Part - 1)</div>
        <div class="input-tab-row">
            <p>
                <label for="">First name<span class="form__star">*</span></label>
                <input class="input-field" id="partnerCustomerInformationFirstName" placeholder="" oninput="this.className = 'input-field'">
            </p>
            <p>
                <label for="">Last name<span class="form__star">*</span></label>
                <input class="input-field" id="partnerCustomerInformationLastName" placeholder="" oninput="this.className = 'input-field'">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Home Address<span class="form__star">*</span></label>
                <input class="input-field" id="partnerCustomerInformationHomeAddress" placeholder="" oninput="this.className = 'input-field'">
            </p>
            <p>
                <label for="">Home street2</label>
                <input class="" id="partnerCustomerInformationHomeStreet2" placeholder="" oninput="this.className = ''">
            </p>
        </div>
        <div class="input-tab-row">
            <p>
                <label for="">City<span class="form__star">*</span></label>
                <input class="input-field" id="partnerCustomerInformationCity" placeholder="" oninput="this.className = 'input-field'">
            </p>
            <p>
                <label for="">State<span class="form__star">*</span></label>
                <select id="partnerCustomerInformationState" class="select-box input-field" placeholder="State" oninput="this.className = 'input-field'">
                    <?php echo $us_state_options; ?>
                </select>
            </p>
            <p>
                <label for="">Zip<span class="form__star">*</span></label>
                <input class="input-field numbersOnly" id="partnerCustomerInformationZip" placeholder="" oninput="this.className = 'input-field'" maxlength="5">
                <span id="partnerCustomerInformationZipSpan"></span>
            </p>
        </div>


    </div>

    <!-- form sixth page -->

    <div class="tab">
        <div class="widget-credit-card-application__heading">Ownership and Principals Information (Part - 2)</div>


        <div class="input-tab-row">
            <p>
                <label for="">Percent Ownership<span class="form__star">*</span></label>
                <input class="input-field numbersOnly" id="partnerCustomerInformationPercentOwnership" placeholder="" oninput="this.className = 'input-field'" maxlength="3">
            </p>
            <p>
                <label for="">Driving License Number<span class="form__star">*</span></label>
                <input class="input-field" id="partnerCustomerInformationDrivingLicenseNumber" placeholder="" oninput="this.className = 'input-field'">
            </p>
        </div>

        <div class="input-tab-row">
            <p>
                <label for="">Drivers License Date of Issuance<span class="form__star">*</span></label>
                <input class="input-field" id="partnerCustomerInformationLicenseDate" type="date" placeholder="" oninput="this.className = 'input-field'" max="<?php echo date('Y-m-d'); ?>">
            </p>
            <p>
                <label for="">Date of Birth<span class="form__star">*</span></label>
                <input class="input-field" id="partnerCustomerInformationDOB" type="date" placeholder="" oninput="this.className = 'input-field'" max="<?php echo date('Y-m-d'); ?>">
            </p>
            <p>
                <label for="">SSN<span class="form__star">*</span></label>
                <input class="input-field numbersOnly" maxlength="9" id="partnerCustomerInformationSSN" placeholder="" oninput="this.className = 'input-field'">
                <span id="partnerCustomerInformationSSNSpan"></span>
            </p>
        </div>
        <div class="input-tab-row">
            <p>
                <label for="">SSN Card<span class="form__star">*</span></label>
                <input class="input-field" id="partnerCustomerInformationSSNCard" accept=".pdf,.jpeg,.jpg,.png" type="file" placeholder="" oninput="this.className = 'input-field'">
                <span></span>
            </p>
            <p>
                <label for="">Drivers License (Front)<span class="form__star">*</span></label>
                <input class="input-field" id="partnerCustomerInformationLicenseFront" accept=".pdf,.jpeg,.jpg,.png" type="file" placeholder="" oninput="this.className = 'input-field'">
                <span></span>
            </p>
            <p>
                <label for="">Drivers License (Back)<span class="form__star">*</span></label>
                <input class="input-field" id="partnerCustomerInformationLicenseBack" accept=".pdf,.jpeg,.jpg,.png" type="file" placeholder="" oninput="this.className = 'input-field'">
                <span></span>
            </p>
        </div>
        <div style="flex-direction: column;  ;">
            <p style="display:flex">
                <input style="width:30px;" class="input-field" id="partnerTermsConditions" type="checkbox" placeholder="" oninput="this.className = 'input-field'">
                <label style="margin-left:1%;" for="">Terms & Conditions<span class="form__star">*</span></label>
            </p>
            <p style="display:flex">
                <input style="width:30px;" class="input-field" id="partnerCreditAutorizationPolicy" type="checkbox" placeholder="" oninput="this.className = 'input-field'">
                <label style="margin-left:1%;" for="">Credit Authorization Policy<span class="form__star">*</span></label>
            </p>
            <span id="checkboxErrorMsg"></span>
        </div>
        <!-- <div class="horizontal__line"></div> -->
        <!-- <div style="margin-top: 50px;">
            <div class="get-insurance-div" id="getInsuranceDiv">
                <div class="widget-credit-card-application__heading">General Liability Insurance Certificate</div>
                <div class="input-tab-row" style="flex-direction: column;">
                    <P style="display: block; text-align:center; font-size:18px; font-weight:500; margin-bottom:15px; margin-top:15px;">
                        Don't have general Liability ?<a href="javascript:void(0)" id="openIframe">Click here</a>
                    </P>
                    <div>
                        <label for="certificate" id="uploadFileBtn"><i class="material-icons" id="uploadIcon">cloud_upload</i>Upload Insurance Certificate</label>
                        <input class="input-field" type="file" id="certificate" name="browse" style="display: none" accept=".docx, .doc, .jpg,.jpeg, .pdf, .png" placeholder="" oninput="this.className = 'input-field'">
                        <span style="color:red; text-align:center; display:block;"></span>
                    </div>
                </div>
            </div>
            <div class="insurance-iframe" id="insuranceIframe" style="display: none;">
                <div class="widget-credit-card-application__heading">Insurance Purchase</div>
                <div class="input-tab-row">
                    <a href="javascript:void(0)" id="backToUploadInsuranceBtn"> <i class="material-icons" style="color: #fff;">reply</i>Back</a>
                </div>
                <div class="input-tab-row">
                    <iframe src="https://app.thimble.com/home?brokerid=PKAX8P5EB" frameborder="0" allow="geolocation *;" width="100%" height="800px"></iframe>
                </div>
            </div>
        </div> -->

    </div>

    <!-- form seventh page  -->

    <div class="tab">
        <div style="margin-top: 50px;">
            <div class="get-insurance-div" id="getInsuranceDiv">
                <div class="widget-credit-card-application__heading">General Liability Insurance Certificate</div>
                <div class="input-tab-row" style="flex-direction: column;">
                    <P style="display: block; text-align:center; font-size:18px; font-weight:500; margin-bottom:15px; margin-top:15px;">
                        Don't have general Liability ?<a href="javascript:void(0)" id="openIframe">Click here</a>
                    </P>
                    <div>
                        <label for="certificate" id="uploadFileBtn"><i class="material-icons" id="uploadIcon">cloud_upload</i>Upload Insurance Certificate</label>
                        <input class="input-field" type="file" id="certificate" name="browse" style="display: none" accept=".docx, .doc, .jpg,.jpeg, .pdf, .png" placeholder="" oninput="this.className = 'input-field'">
                        <span style="color:red; text-align:center; display:block;"></span>
                    </div>
                </div>
            </div>
            <div class="insurance-iframe" id="insuranceIframe" style="display: none;">
                <div class="widget-credit-card-application__heading">Insurance Purchase</div>
                <div class="input-tab-row">
                    <a href="javascript:void(0)" id="backToUploadInsuranceBtn"> <i class="material-icons" style="color: #fff;">reply</i>Back</a>
                </div>
                <div class="input-tab-row">
                    <iframe src="https://app.thimble.com/home?brokerid=PKAX8P5EB" frameborder="0" allow="geolocation *;" width="100%" height="800px"></iframe>
                </div>
            </div>
        </div>
    </div>


    <div style="overflow:auto;" class="widget-button__master-div">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>
</form>
<script>
    let referenceID = window.location.pathname.split('/');
    let uniqueReferenceID = referenceID[referenceID.length - 1];
    // console.log(uniqueReferenceID)
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
        if (n == (x.length - 2)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function showInsuranceTab() {
        var x = document.getElementsByClassName("tab");
        // console.log(x);
        document.querySelector("#registrationID").style.cssText += "display:none;";
        document.querySelector("#regForm").style.cssText += "display:block;";
        document.querySelector("#loaderID").style.cssText += "display:none;";
        document.getElementById("prevBtn").style.display = `none`;


        x[x.length - 2].style.cssText += "display:none;";
        x[x.length - 1].style.cssText += "display:block;";
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :

        if (currentTab == x.length - 1) {
            // collect the data on submit 
            document.getElementById("nextBtn").addEventListener("click", partnerDataUpload());
            document.getElementById("nextBtn").setAttribute("class", "lastSubmitButton")
            //...the form gets submitted:
            // document.getElementById("regForm").submit();
            return false;
        }


        if (document.querySelectorAll(".lastSubmitButton").length > 0) {
                uploadInsuranceFunction()
        }

        // if (currentTab == x.length) {
        //     // collect the data on submit 
        //     document.getElementById("nextBtn").addEventListener("click", () =>{
        //         alert("hello")
        //     });
        //     //...the form gets submitted:
        //     // document.getElementById("regForm").submit();
        //     return false;
        // }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        //     // This function deals with validation of the form fields
        var x, y, z, q, r, i, valid = true;
            // x = document.getElementsByClassName("tab");
            // z = x[currentTab].getElementsByClassName("input-field");
            // q = x[currentTab].querySelectorAll("input[type='checkbox']");
            // r = x[currentTab].getElementsByTagName("input");


            // //>>>>>>>>>>>this is the code for the verify section in the routing numbers and account numbers<<<<<<<<<<<<<

            // for (i = 0; i < r.length; i++) {
            //     //>>>>>>>>>>>>>this code of for verifying routing number<<<<<<<<<<<<
            //     if (document.querySelector("#partnerBankInformationRoutingNumber").value != document.querySelector("#partnerBankInformationVerifyRoutingNumber").value) {
            //         valid = false;
            //         document.querySelector("#verifyRountingNumberSpan").innerText = "Routing Number doesn't match";
            //     } else {
            //         document.querySelector("#verifyRountingNumberSpan").innerText = "";
            //     }
            //     //>>>>>>>>>>>>>>>>>this is the code for the verifying account number<<<<<<<<<<<<<<<<<<<<
            //     if (document.querySelector("#partnerBankInformationAccountNumber").value != document.querySelector("#partnerBankInformationVerifyAccountNumber").value) {
            //         valid = false;
            //         document.querySelector("#verifyAccountNumberSpan").innerText = "Account Number doesn't match";
            //     } else {
            //         document.querySelector("#verifyAccountNumberSpan").innerText = "";
            //     }
            //     //>>>>>>>>>>>>>>>>this is the code for the email validation<<<<<<<<<<<<<<<<<<<<<<<<<<
            //     if (document.querySelector("#emailCheckingSpan").innerText == "email is not valid") {
            //         valid = false;
            //     }
            //     //>>>>>>>>>>>>>>>>>>>>>>>>>>>>this code is for the website validation<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
            //     if (document.querySelector("#websiteSpan").innerText == "invalid Website") {
            //         valid = false;
            //     }
            //     //>>>>>>>>>>>>>>>>>this code is for the input field length<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< 
            //     if (document.querySelector(".active").innerText == "1") {
            //         if (document.querySelector("#partnerBusinessPhone").value.length < 10) {
            //             valid = false;
            //             document.querySelector("#partnerBusinessPhoneSpan").innerText = "invalid phone number length";
            //         } else {
            //             document.querySelector("#partnerBusinessPhoneSpan").innerText = "";
            //         }

            //         if (document.querySelector("#partnerTaxID ").value.length < 9) {
            //             valid = false;
            //             document.querySelector("#partnerTaxIDSpan").innerText = "invalid tax id number length";
            //         } else {
            //             document.querySelector("#partnerTaxIDSpan").innerText = "";

            //         }

            //         if ((document.querySelector("#partnerBusinessFax").value.length < 7) && (document.querySelector("#partnerBusinessFax").value.length > 0)) {
            //             valid = false;
            //             document.querySelector("#partnerBusinessFaxSpan").innerText = "invalid fax length";
            //         } else {
            //             document.querySelector("#partnerBusinessFaxSpan").innerText = "";
            //         }
            //     }


            //     if (document.querySelector(".active").innerText == "2") {
            //         if (document.querySelector("#partnerGeneralInformationZip").value.length < 5) {
            //             valid = false;
            //             document.querySelector("#partnerGeneralInformationZipSpan").innerText = "invalid zip length";
            //         } else {
            //             document.querySelector("#partnerGeneralInformationZipSpan").innerText = "";
            //         }
            //     }

            //     if (document.querySelector(".active").innerText == "4") {
            //         if (document.querySelector("#partnerBankInformationRoutingNumber").value.length < 9) {
            //             valid = false;
            //             document.querySelector("#partnerBankInformationRoutingNumberSpan").innerText = "invalid rounting length";
            //         } else {
            //             document.querySelector("#partnerBankInformationRoutingNumberSpan").innerText = "";
            //         }

            //         if (document.querySelector("#partnerBankInformationAccountNumber ").value.length < 4) {
            //             valid = false;
            //             document.querySelector("#partnerBankInformationAccountNumberSpan").innerText = "invalid account number length";
            //         } else {
            //             document.querySelector("#partnerBankInformationAccountNumberSpan").innerText = "";
            //         }
            //     }


            //     if (document.querySelector(".active").innerText == "5") {
            //         if (document.querySelector("#partnerCustomerInformationZip ").value.length < 5) {
            //             valid = false;
            //             document.querySelector("#partnerCustomerInformationZipSpan").innerText = "invalid zip length";
            //         } else {
            //             document.querySelector("#partnerCustomerInformationZipSpan").innerText = "";
            //         }
            //     }

            //     if (document.querySelector(".active").innerText == "6") {
            //         if (document.querySelector("#partnerCustomerInformationSSN ").value.length < 9) {
            //             valid = false;
            //             document.querySelector("#partnerCustomerInformationSSNSpan").innerText = "invalid ssn length";
            //         } else {
            //             document.querySelector("#partnerCustomerInformationSSNSpan").innerText = "";
            //         }
            //     }
            // }


            // // >>>>>>>>>>>>>>>>>>this validation is for the variable z<<<<<<<<<<<<<<<<<<<<<< 
            // for (i = 0; i < z.length; i++) {
            //     // If a field is empty...
            //     if (z[i].value == "") {
            //         // add an "invalid" class to the field:
            //         z[i].className += " invalid";
            //         // and set the current valid status to false:
            //         valid = false;
            //     }
            // }

            // // >>>>>>>>>>>>>>>>>>>>>this is the validation for the checkbox section<<<<<<<<<<<<<<<<<<<<<<<<<< 
            // for (i = 0; i < q.length; i++) {
            //     if (!document.querySelector("#partnerCreditAutorizationPolicy").checked) {
            //         document.querySelector("#checkboxErrorMsg").innerText = "Please tick all options";
            //         valid = false;
            //     } else {
            //         document.querySelector("#checkboxErrorMsg").innerText = "";
            //     }
            //     if (!document.querySelector("#partnerTermsConditions").checked) {
            //         document.querySelector("#checkboxErrorMsg").innerText = "Please tick all options";
            //         valid = false;
            //     } else {
            //         document.querySelector("#checkboxErrorMsg").innerText = "";
            //     }
            // }









        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            console.log(currentTab)
            document.getElementsByClassName("step")[currentTab].className += " finish";
            // document.getElementsByClassName("step")[currentTab].innerHTML = `<i class="material-icons">check</i>`
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }

    // this code is for put the active status on tabs if the user click on previous button 
    document.querySelector("#prevBtn").addEventListener("click", e => {
        document.querySelector(".active").classList.remove("finish");
    })

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
            "partnerBankInformationBankName": document.querySelector("#partnerBankInformationBankName").value,
            "partnerBankInformationBankPhone": document.querySelector("#partnerBankInformationBankPhone").value,
            "partnerBankInformationCheckingAccountName": document.querySelector("#partnerBankInformationCheckingAccountName").value,
            "partnerBankInformationRoutingNumber": document.querySelector("#partnerBankInformationRoutingNumber").value,
            "partnerBankInformationAccountNumber": document.querySelector("#partnerBankInformationAccountNumber").value,
            "partnerCustomerInformationFirstName": document.querySelector("#partnerCustomerInformationFirstName").value,
            "partnerCustomerInformationLastName": document.querySelector("#partnerCustomerInformationLastName").value,
            "partnerCustomerInformationHomeAddress": document.querySelector("#partnerCustomerInformationHomeAddress").value,
            "partnerCustomerInformationHomeStreet2": document.querySelector("#partnerCustomerInformationHomeStreet2").value,
            "partnerCustomerInformationState": document.querySelector("#partnerCustomerInformationState").value,
            "partnerCustomerInformationCity": document.querySelector("#partnerCustomerInformationCity").value,
            "partnercustomerInformationZip": document.querySelector("#partnerCustomerInformationZip").value,
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

        //>>>>>>>this is the code for the loader when the api take time to connect the loader is shown to the user<<<<<<<<<< 
        document.querySelector("#loaderID").style.cssText += "display:flex; z-index:252";

        //>>>>>>>>>>>>>>>>>>this is the code for the upload images and files and send to the api<<<<<<<<<<<<<<<<<<<<<<<<<<<<

        // const ein_letter = document.querySelector("#partnerEIN").files;
        const articles = document.querySelector("#partnerIncorporationArticles").files;
        const bank_statement = document.querySelector("#partnerBankInformationRecentBankStatement").files;
        const ssn_card = document.querySelector("#partnerCustomerInformationSSNCard").files;
        const dl_front = document.querySelector("#partnerCustomerInformationLicenseFront").files;
        const dl_back = document.querySelector("#partnerCustomerInformationLicenseBack").files;
        const formData = new FormData();
        // formData.append('ein_letter', ein_letter[0]);
        formData.append('articles', articles[0]);
        formData.append('bank_statement', bank_statement[0]);
        formData.append('ssn_card', ssn_card[0]);
        formData.append('dl_front', dl_front[0]);
        formData.append('dl_back', dl_back[0]);

        fetch('https://artechnity.in/track/index.php/api/zapierData', {
                method: 'POST',
                headers: {
                    'data': JSON.stringify(gettingFormData()),
                    'referenceID': uniqueReferenceID
                },
                body: formData
            })
            .then(response => {
                return response.text();
            })
            .then(data => {
                document.querySelector("#regForm").style.cssText += "display:none;";
                document.querySelector("#registrationID").style.cssText += "display:block;";
                document.querySelector("#registration").innerText = `${JSON.parse(data).applicationID}`
                localStorage.setItem('CCA-ID', `${JSON.parse(data).applicationID}`);
                // console.log(JSON.parse(data));
            })
            .catch(error => {
                console.error(error)
            })
    }



    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>this code is for the input the numbers only<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<


    document.querySelectorAll(".numbersOnly").forEach(item => {
        item.addEventListener("keypress", input => {
            let regEx = /^[0-9]+$/;
            if (regEx.test(input.key)) {
                return true;
            }
            input.preventDefault();
            return false;
        })
    })
    //>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>this code is for the email validation<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

    document.querySelectorAll(".emailOnly").forEach(item => {
        let regEx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        item.addEventListener("input", () => {
            if (regEx.test(item.value)) {
                item.style.cssText += "border: 1px solid green;";
                document.querySelector("#emailCheckingSpan").innerText = "email is valid";
                document.querySelector("#emailCheckingSpan").style.cssText += "color:green;";
            } else {
                item.style.cssText += "border: 1px solid red;";
                document.querySelector("#emailCheckingSpan").innerText = "email is not valid";
                document.querySelector("#emailCheckingSpan").style.cssText += "color:red;";
            }
        });
    });

    //>>>>>>>>>>>>>>>>>>>>>>>this code is for the website validation<<<<<<<<<<<<<<<<<<<<<<<<
    document.querySelectorAll(".websiteOnly").forEach(item => {
        let regEx = /(?:https?):\/\/(\w+:?\w*)?(\S+)(:\d+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
        item.addEventListener("input", () => {
            if (regEx.test(item.value)) {
                item.style.cssText += "border: 1px solid green";
                document.querySelector("#websiteSpan").innerText = "valid Website";
                document.querySelector("#websiteSpan").style.cssText += "color:green; font-size:12px;";
            } else {
                item.style.cssText += "border:1px solid red";
                document.querySelector("#websiteSpan").innerText = "invalid Website";
                document.querySelector("#websiteSpan").style.cssText += "color:red; font-size:12px;";
            }
        })
    })

    // this is the validation for the file size is less than 10mb 
    document.querySelectorAll("input[type='file']").forEach(item => {
        item.addEventListener("change", () => {
            if (item.files[0].size / 1024 / 1024 > 10) {
                item.nextSibling.nextSibling.innerText = "maximum size is 10mb"
                item.value = "";
            } else {
                item.nextSibling.nextSibling.innerText = "";
            }

        })
    })



    //>>>>>>>>>>>>>>>>>this is the function when the user click to form button its get back to the form again<<<<<<<<<<<<<
    document.querySelector("#goToFormAgain").addEventListener("click", () => {
        window.location.href = "https://artechnity.in/partner/credit-card-application/PR2022QZRBL";
    });

    //>>>>>>>>>>>>>>this is the function when the user tap on the home button then it will redirect to the home page<<<<<<<<<<<<
    // document.querySelector("#goToHomeAgain").addEventListener("click", () => {
    //     window.location.href = "https://artechnity.in/partner/dashboard/PR2022QZRBL";
    // });



    //>>>>>>>>>>>>>>>>>>>>>this is the code for the geting insurance tab styling using javascript<<<<<<<<<<<<<<<<<<<<<<<<<<
    document.querySelector("#openIframe").addEventListener("click", () => {
        document.getElementById("nextBtn").style.cssText += "display:none;";
        document.querySelector("#getInsuranceDiv").style.cssText += "display:none;";
        document.querySelector("#insuranceIframe").style.cssText += "display:block;";
    });
    document.querySelector("#backToUploadInsuranceBtn").addEventListener("click", () => {
        document.getElementById("nextBtn").style.cssText += "display:block;";
        document.querySelector("#getInsuranceDiv").style.cssText += "display:block;";
        document.querySelector("#insuranceIframe").style.cssText += "display:none;";
    });


    // this is the code for the thimble insurance api 

    const uploadInsuranceFunction = event => {
        // console.log(localStorage.getItem('CCA-ID'));
        document.querySelector("#loaderID2").style.cssText += "display:flex; z-index:252";

        const upload_insuranceCertificate = document.querySelector("#certificate").files;
        const formData1 = new FormData();
        formData1.append('upload_insuranceCertificate', upload_insuranceCertificate[0]);

        fetch('https://artechnity.in/track/index.php/api/zapierData_insurance', {
            method: 'POST',
            headers: {
                'applicationID': localStorage.getItem('CCA-ID'),
            },
            body: formData1,
        }).then(response => {
            return response.text();
        }).then(data => {
            document.querySelector("#regForm").style.cssText += "display:none;";
            document.querySelector("#loaderID2").style.cssText += "display:none;";
            document.querySelector("#registrationID2").style.cssText += "display:block;";
            document.querySelector("#registration2").innerText = `${JSON.parse(data).message}`
            console.log(JSON.parse(data));
        }).catch(error => {
            console.error(error);
        })
    };

    // if(document.querySelectorAll(".lastSubmitButton").length > 0){
    // document.querySelector(".lastSubmitButton").addEventListener('click', () =>{
    //     alert("hello");
    // });
    // }



    //>>>>>>>>>>>>this is the new function for the files to be loaded on when the user select the file 


    // const uploadTrial = event => {
    //     // console.log(localStorage.getItem('CCA-ID'));
    //     // document.querySelector("#loaderID2").style.cssText += "display:flex; z-index:252";

    //     const upload_insuranceCertificate = document.querySelector("#partnerEIN").files;
    //     const formData1 = new FormData();
    //     formData1.append('image', upload_insuranceCertificate[0]);

    //     fetch('https://artechnity.in/track/index.php/api/attachement', {
    //         method: 'POST',
    //         headers: {
    //             // 'content-type': "application/json",
    //             'imagetype':'EIN',
    //             'jsonData':'Dummy'
    //         },
    //         body: formData1,
    //     }).then(response => {
    //         return response.text();
    //     }).then(data => {
    //         // document.querySelector("#regForm").style.cssText += "display:none;";
    //         // document.querySelector("#loaderID2").style.cssText += "display:none;";
    //         // document.querySelector("#registrationID2").style.cssText += "display:block;";
    //         // document.querySelector("#registration2").innerText = `${JSON.parse(data).message}`
    //         console.log(data);
    //     }).catch(error => {
    //         console.error(error);
    //     })
    // };



    const uploadFunction = event => {
        document.querySelector("#uploadEINLetter").addEventListener('click',() => {
            let ein_letter = document.querySelector("#partnerEIN");
            // console.log(ein_letter.files[0])
            let  xhr = new XMLHttpRequest();
            const formdata = new FormData();

            formdata.append('image',ein_letter.files[0])

          xhr.onreadystatechange = () => {
              if(xhr.status == 200){
                  console.log(xhr.responseText);
                 
              }
          }

            xhr.upload.onloadstart = e => {
                document.querySelector("#firstProgressBar").value = 0;
                document.querySelector("#firstProgressBar").max = e.total;
            }

            xhr.upload.onprogress = e => {
                document.querySelector("#firstProgressBar").value = e.loaded;
                document.querySelector("#firstProgressBar").max = e.total;
            };

            xhr.upload.onloadend = () => {
                console.log("hello");

            }
            xhr.open('POST','https://artechnity.in/track/index.php/api/attachement',true);
            // xhr.setRequestHeader('Content-type','application/json');
            xhr.setRequestHeader('imagetype','EIN');
            xhr.setRequestHeader('JsonData','Dummy');
            xhr.send(formdata)
            // XMLHttpRequest.getAllResponseHeaders()
        });
    }
    uploadFunction()

    // document.querySelector("#uploadEINLetter").addEventListener('click',uploadFunction);
</script>