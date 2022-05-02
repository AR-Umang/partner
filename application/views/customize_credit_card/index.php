<div class="cardButtonHolder customize-card-popup-slider-open mb-4">
    <button type="button" class="customize-card-button" id="idone">Customize Your Card</button>
</div>

<div class="container">
    <div class="row">
        <?php if (isset($creditcard)) {
            foreach ($creditcard as $row) { ?>
                <div class="col-md-3 ml-1 mr-1 card-sec1 mt-4">
                    <div class="customise-card-master-wrapper">
                        <div class="img img-container">
                            <img src="<?php echo adminurl; ?>uploads/customCard/<?php echo $row['custom_card_image']; ?>" alt="">
                        </div>

                        <div class="info-container pt-0">
                            <div class="card-status-blue pb-3 pt-2">
                                <?php if ($row['custom_card_status'] == 0) { ?>
                                    <li style="color: #2c80ff;"> PENDING REVIEW </li>
                                <?php } else if ($row['custom_card_status'] == 1) { ?>
                                    <li style="color: #00d285;"> Online </li>
                                <?php } else if ($row['custom_card_status'] == 2) { ?>
                                    <li style="color: #ff6868;"> Archived </li>
                                <?php } else if ($row['custom_card_status'] == 3) { ?>
                                    <li> Draft </li>
                                <?php } else { ?>
                                    <li style="color: #df4759;"> Rejected </li>
                                <?php } ?>
                            </div>
                            <div class="card-name">
                                <b>
                                    <p><?php echo $row['custom_card_name']; ?></p>
                                </b>
                            </div>

                            <div class="card-bottom-content-wrapper">
                                <div class="d-flex justify-content-between">
                                    <div class="fees card-table">
                                        <span class="dark-color thin-table-text">INITIATION FEE<p class="bold-table-text">$ 5000</p></span>
                                    </div>
                                    <div class="fees card-table">
                                        <span class="dark-color thin-table-text">ANNUAL FEE<p class="bold-table-text">$ 2500</p></span>
                                    </div>
                                </div>
                                <div class="offer card-table">
                                    <span class="dark-color thin-table-text">CASH BACK OFFER<p class="bold-table-text">3 %</p></span>
                                </div>
                            </div>
                            <div class="card-bottom-btn-wrapper">
                                <div class="edit-btn">
                                    <span></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-bottom-sec">
                            <a class="bottom-link" href="#"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            <a class="bottom-link" onclick="sweetalert('Archived card', 'partnerStatus/2/', '<?php echo $row['custom_card_id'];?>')"><i class="fa-solid fa-box-archive"></i> Archive</a>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>

<!-- this section is for customize the card  -->


<!-- <div class="customize-card-popup-slider"> -->
<div class="customize-popup-master-wrapper">
    <div class="card-two-section-wrapper">
        <!-- card left section starts here -->
        <div class="card-left-section">
            <div class="heading">
                <h1>Customize card</h1>
            </div>
            <div class="card-left-content-wrapper">
                <form action="">
                    <div class="card-input-field my-3">
                        <input type="text" id="cardProgramName" required>
                        <label for="cardProgramName">Card Name</label>
                    </div>
                    <div class="card-input-field">
                        <input type="text" id="description" required>
                        <label for="description">Description</label>
                    </div>
                </form>


                <!-- this is new section ui for this page  -->
                <div class="row left-section-divider-row">
                    <div class="col-3 left-customize-div">
                        <div class="active-option left-top-logo-div">
                            <div>Top logo</div>
                        </div>
                        <div class="left-left-side-image-div">
                            <div>Left Side image</div>
                        </div>
                        <div class="left-left-side-color-div">
                            <div>Left Side color</div>
                        </div>
                        <div class="left-arrow-div">
                            <div>Arrow Color</div>
                        </div>
                        <div class="left-right-color-div">
                            <div>Right side color</div>
                        </div>
                        <div class="left-visa-color-div">
                            <div>Visa Color</div>
                        </div>
                    </div>
                    <div class="col-9 right-customize-div">
                        <div class="right-content-wrapper">
                            <div class="right-content">

                                <!-- top logo file picker wrapper-->
                                <div class="top-logo-file-picker-wrapper right-top-logo-div right-common-content">
                                    <div class="color-picker-master-wrapper active">
                                        <div class="left-section-file-picker">
                                            <div class="file-upload-card">
                                                <input type="file" name="" id="topLogoFilePicker">
                                                <div class="file-upload-card-text">
                                                    <span class="fa-solid fa-image"></span>
                                                    <label for="topLogoFilePicker">Click to select file</label>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0)" id="topLogoFileBtn" class="apply-color-button apply-btn">Apply</a>
                                                <a href="javascript:void(0)" id="topLogoDeleteBtn" class="apply-color-button reset-btn">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <!-- left section image picker -->
                                <div class="left-section-image-picker-wrapper right-left-side-image-div right-common-content">
                                    <div class="color-picker-master-wrapper">
                                        <div class="left-section-file-picker">
                                            <div class="file-upload-card">
                                                <input type="file" name="" id="LeftSectionFilePicker">
                                                <div class="file-upload-card-text">
                                                    <span class="fa-solid fa-image"></span>
                                                    <label for="LeftSectionFilePicker">Click to select file</label>
                                                </div>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0)" id="LeftSectionFileBtn" class="apply-color-button apply-btn">Apply</a>
                                                <a href="javascript:void(0)" id="LeftSectionDeleteBtn" class="apply-color-button reset-btn">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- left section color picker -->
                                <div class="left-section-color-picker-wrapper right-left-side-color right-common-content">
                                    <div class="color-picker-master-wrapper">
                                        <div class="left-section-color-picker">

                                            <input type="color" name="" id="LeftSectionColorPicker" value="#DDDDDD">
                                            <a href="javascript:void(0)" id="LeftSectionBtn" class="apply-color-button apply-btn">Apply</a>
                                        </div>
                                    </div>
                                </div>



                                <!-- arrow color picker wrapper-->
                                <div class="arrow-color-picker-wrapper right-arrow-div right-common-content">
                                    <div class="color-picker-master-wrapper">
                                        <div class="arrow-color-picker">
                                            <input type="color" name="" id="arrowColorPicker" value="#707070">
                                            <a href="javascript:void(0)" id="arowColorBtn" class="apply-color-button apply-btn">Apply</a>
                                        </div>
                                    </div>
                                </div>


                                <!-- right section color  -->
                                <div class="right-section-color-picker-wrapper right-right-color-div right-common-content">
                                    <div class="color-picker-master-wrapper">
                                        <div class="right-section-color-picker">
                                            <input type="color" name="" id="RightSectionColorPicker" value="#ffffff">
                                            <a href="javascript:void(0)" id="RightSectionBtn" class="apply-color-button apply-btn">Apply</a>
                                        </div>
                                    </div>
                                </div>


                                <!-- visa section  -->
                                <div class="visa-section-wrapper right-visa-color-div right-common-content">
                                    <h4>Visa Color</h4>
                                    <div class="visa-master-wrapper">
                                        <div class="visa-section">
                                            <select class="form-control form-select visa-select-box" id="cardVisaColor">
                                                <option selected>Select the Color</option>
                                                <option value="White">White</option>
                                                <option value="Black">Black</option>
                                                <option value="Purple">Purple</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>






















            </div>
        </div>
        <!-- card right section starts here -->
        <div class="card-right-section">
            <div class="cardButtonHolder customize-card-popup-slider-close">
                <div type="button" class="cancel-btn" title="cancel"><span class="fas fa-times"></span></div>
            </div>
            <div class="customize-credit-card-wrapper">
                <div class="left-side-arrow">
                    <div class="left-side-top-arrow"></div>
                    <div class="left-side-bottom-arrow" id="arrowColor"></div>
                </div>
                <div class="visa-image">
                    <!-- <img src="<?php echo base_url(); ?>assets/images/visaLogo.png" alt=""> -->
                    <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" version="1.1" id="Layer_1" width="80" height="30" viewBox="0 0 1000 324.68351" overflow="visible" enable-background="new 0 0 659.055 202.068" xml:space="preserve" inkscape:version="1.0.2 (e86c870879, 2021-01-15)" sodipodi:docname="Visa_2021.svg" style="overflow:visible">
                        <metadata id="metadata3739">
                            <rdf:RDF>
                                <cc:Work rdf:about="">
                                    <dc:format>image/svg+xml</dc:format>
                                    <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
                                    <dc:title></dc:title>
                                </cc:Work>
                            </rdf:RDF>
                        </metadata>
                        <defs id="defs3737">
                            <linearGradient id="linearGradient3801">
                                <stop style="stop-color:#20225f;stop-opacity:1" offset="0" id="stop3803" />
                                <stop id="stop3815" offset="0.2" style="stop-color:#1a1f61;stop-opacity:1" />
                                <stop id="stop3813" offset="0.41023257" style="stop-color:#172272;stop-opacity:1" />
                                <stop id="stop3811" offset="0.59519672" style="stop-color:#152682;stop-opacity:1" />
                                <stop id="stop3809" offset="0.80208331" style="stop-color:#12288e;stop-opacity:1" />
                                <stop style="stop-color:#0e2c9a;stop-opacity:1" offset="1" id="stop3805" />
                            </linearGradient>
                        </defs>
                        <sodipodi:namedview pagecolor="#ffffff" bordercolor="#666666" borderopacity="1" objecttolerance="10" gridtolerance="10" guidetolerance="10" inkscape:pageopacity="0" inkscape:pageshadow="2" inkscape:window-width="1366" inkscape:window-height="705" id="namedview3735" showgrid="false" fit-margin-left="0.5" fit-margin-bottom="0.5" fit-margin-top="0.5" fit-margin-right="0.5" inkscape:zoom="0.49497088" inkscape:cx="473.80866" inkscape:cy="-26.853447" inkscape:window-x="-8" inkscape:window-y="-8" inkscape:window-maximized="1" inkscape:current-layer="Layer_1" inkscape:document-rotation="0">
                            <inkscape:grid type="xygrid" id="grid3787" empspacing="5" visible="true" enabled="true" snapvisiblegridlinesonly="true" />
                        </sodipodi:namedview>

                        <path id="visaPath" style="fill:#1434cb;fill-opacity:1;stroke:none" d="m 651.18503,0.50000002 c -70.93272,0 -134.32163,36.76584998 -134.32163,104.69357998 0,77.90028 112.42264,83.28082 112.42264,122.41576 0,16.47806 -18.88384,31.22851 -51.13668,31.22851 -45.77308,0 -79.98403,-20.61081 -79.98403,-20.61081 l -14.63836,68.54658 c 0,0 39.41037,17.40989 91.73375,17.40989 77.55217,0 138.57651,-38.57104 138.57651,-107.66029 0,-82.3157 -112.89106,-87.53633 -112.89106,-123.86008 0,-12.9082 15.50201,-27.05169 47.66251,-27.05169 36.28682,0 65.89216,14.98968 65.89216,14.98968 l 14.32608,-66.20444 c 0,0 -32.21317,-13.89668998 -77.64189,-13.89668998 z M 2.2175605,5.49657 0.49999253,15.48969 c 0,0 29.84159547,5.46149 56.71878047,16.35593 34.606624,12.4927 37.071853,19.7653 42.900167,42.35367 l 63.51098,244.83152 85.13673,0 131.15974,-313.53424 -84.94155,0 L 210.7069,218.67018 176.3165,37.97422 C 173.1626,17.29371 157.18709,5.49657 137.63219,5.49657 l -135.4146295,0 z m 411.8650095,0 -66.63383,313.53424 80.99895,0 66.39962,-313.53424 -80.76474,0 z m 451.75943,0 c -19.53181,0 -29.88045,10.45695 -37.47421,28.73022 l -118.66834,284.80402 84.94155,0 16.434,-47.46734 103.48348,0 9.99312,47.46734 74.94843,0 -65.3847,-313.53424 -68.27333,0 z m 11.04709,84.70733 25.17799,117.65341 -67.45359,0 42.2756,-117.65341 z" id="path3789" inkscape:connector-curvature="0" />
                    </svg>
                </div>
                <div class="custom-logo-image" id="cutomLogoImage">
                    <img class="top-logo-image" src="<?php echo base_url(); ?>assets/images/credit.svg" alt="">
                </div>
                <div class="card-chip-image">
                    <img src="<?php echo base_url(); ?>assets/images/chip.png" alt="">
                </div>
                <div class="top-logo">
                    <img src="<?php echo base_url(); ?>assets/images/kapedLogo.png" alt="">
                </div>
            </div>
            <div class="cardButtonHolder">
                <!-- <button type="button" class="tilt-button">Tilt Card</button> -->
                <div type="button" class="rotate-btn tilt-button" title="rotate"><span class="fa-solid fa-rotate"></span></div>
                <button type="button" class="create-btn" id="nextStepButton">Next</button>
                <button type="button" class="reset-button">Reset Design</button>
            </div>
        </div>
    </div>
    <!-- <div class="cardButtonHolder customize-card-popup-slider-close">
      <button type="button" class="cancel-btn">Cancel</button>
      <button type="button" class="create-btn">Create</button>
    </div> -->
</div>
<!-- </div> -->








<!-- js code for this page  -->