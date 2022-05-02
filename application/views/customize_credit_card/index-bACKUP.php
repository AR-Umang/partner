<div class="customize-credit-card-master-wrapper">
    <div class="customize-credit-card-wrapper">
        <div class="left-side-arrow">
            <div class="left-side-top-arrow"></div>
            <div class="left-side-bottom-arrow" id="arrowColor"></div>
        </div>
        <div class="visa-image">
            <img src="<?php echo base_url();?>assets/images/visaLogo.png" alt="">
        </div>
        <div class="custom-logo-image" id="cutomLogoImage">
            <img class="top-logo-image" src="<?php echo base_url();?>assets/images/credit.svg" alt="">
        </div>
        <div class="card-chip-image">
            <img src="<?php echo base_url();?>assets/images/chip.png" alt="">
        </div>
        <div class="top-logo">
            <img src="<?php echo base_url();?>assets/images/kapedLogo.png" alt="">
        </div>
    </div>

    <!-- this part is to be the color picker for the different section   -->

    <div class="color-picker-master-wrapper">
        <div class="left-section-color-picker">
            <div>
                <label for="LeftSectionColorPicker">Left Section Color</label>
            </div>
            <div>
                <input type="color" name="" id="LeftSectionColorPicker" value="#DDDDDD">
                <a href="javascript:void(0)" id="LeftSectionBtn" class="apply-color-button">Apply</a>
             </div>
        </div>
        <div class="arrow-color-picker">
            <label for="arrowColorPicker">Arrow Color</label>
            <input type="color" name="" id="arrowColorPicker" value="#707070">
            <a href="javascript:void(0)" id="arowColorBtn" class="apply-color-button">Apply</a>
        </div>
        <div class="right-section-color-picker">
            <label for="RightSectionColorPicker">Right Section Color</label>
            <input type="color" name="" id="RightSectionColorPicker" value="#ffffff">
            <a href="javascript:void(0)" id="RightSectionBtn" class="apply-color-button">Apply</a>
        </div>
    </div>

    <div class="color-picker-master-wrapper">
    <div class="left-section-file-picker">
            <label for="LeftSectionFilePicker">Left Section Image</label>
            <input type="file" name="" id="LeftSectionFilePicker">
            <a href="javascript:void(0)" id="LeftSectionFileBtn" class="apply-color-button">Apply</a>
            <a href="javascript:void(0)" id="LeftSectionDeleteBtn" class="apply-color-button">Reset</a>
    </div>
    </div>

    <div class="color-picker-master-wrapper">
    <div class="left-section-file-picker">
            <label for="topLogoFilePicker">Top Logo</label>
            <input type="file" name="" id="topLogoFilePicker">
            <a href="javascript:void(0)" id="topLogoFileBtn" class="apply-color-button">Apply</a>
            <a href="javascript:void(0)" id="topLogoDeleteBtn" class="apply-color-button">Reset</a>
    </div>
    </div>
</div>

<!-- <script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelector("#arowColorBtn").addEventListener('click',() => {
            let color = document.querySelector("#arrowColorPicker").value;
            document.querySelector("#arrowColor").style.cssText += `background:${color};`;
        });
        document.querySelector("#LeftSectionBtn").addEventListener('click',() => {
            let color = document.querySelector("#LeftSectionColorPicker").value;
            document.querySelector(".left-side-top-arrow").style.cssText += `background:${color};`;
        });
        document.querySelector("#RightSectionBtn").addEventListener('click',() => {
            let color = document.querySelector("#RightSectionColorPicker").value;
            document.querySelector(".left-side-arrow").style.cssText += `background:${color};`;
        });

// =============== code for upload image starts =============================

        document.querySelector('#LeftSectionFilePicker').addEventListener('change',() => {
                let imgurl = document.querySelector("#LeftSectionFilePicker");
                const reader = new FileReader();
                reader.addEventListener('load',() => {
                    localStorage.setItem("applyBgImg" , reader.result)
                });
                reader.readAsDataURL(imgurl.files[0]);
        });
        document.querySelector("#LeftSectionFileBtn").addEventListener('click',() => {
            const recentImg = localStorage.getItem("applyBgImg");
                document.querySelector('.left-side-top-arrow').setAttribute("style", `background-image: url('${recentImg}')`);
        });
        document.querySelector("#LeftSectionDeleteBtn").addEventListener('click',() => {
            const recentImg = localStorage.getItem("applyBgImg");
                document.querySelector('.left-side-top-arrow').removeAttribute("style");
                localStorage.removeItem("applyBgImg");
        });
// =============== code for upload image ends =============================


// =============== code for upload image starts =============================

document.querySelector('#topLogoFilePicker').addEventListener('change',() => {
                let imgurl = document.querySelector("#topLogoFilePicker");
                const reader = new FileReader();
                reader.addEventListener('load',() => {
                    localStorage.setItem("applyLogoImg" , reader.result)
                });
                reader.readAsDataURL(imgurl.files[0]);
        });
        document.querySelector("#topLogoFileBtn").addEventListener('click',() => {
            const recentImg = localStorage.getItem("applyLogoImg");
                document.querySelector('.top-logo-image').setAttribute("src", `${recentImg}`);
        });
        document.querySelector("#topLogoDeleteBtn").addEventListener('click',() => {
            const recentImg = localStorage.getItem("applyLogoImg");
                document.querySelector('.top-logo-image').removeAttribute("src");
                localStorage.removeItem("applyLogoImg");
        });
// =============== code for upload image ends =============================
    
    });


</script> -->