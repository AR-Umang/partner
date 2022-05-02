<!-- this is the code for the next page but for now we create this page here  -->

<style>
    .benefit-option-div{
      background:#fff;
    }
    #benefitID{
      background:transparent;
      margin-top:10px;
    }
    .permanent-benefit{
      width:auto!important;
      margin-bottom:0;
      margin-top:0;
      background:transparent;
      text-align:left;
    }
    .permanent-benefit label{
      font-size: 12px;
      color: #000;
      font-weight: 600;
      margin-left:5px;
    }
    .permanent-benefit div{
      margin-left:5px;
    }
    .add-option{
      background:transparent;
      height: inherit;
      margin-top:25px;
      text-align:left;
      border-radius:3px;
    }
    .right-benefit-option-div{
      background:transparent;
    }
    .right-benefit-option-div label{
      font-size:15px;
    }
    .same-permanent-benefit{
      text-align:left;
      background:transparent;
      border:1.5px solid #000;
      border-radius:3px; 
    }
    .same-permanent-benefit div{
      margin-left:5px;
    }
    .same-permanent-benefit label{
      margin-left:5px;
    }
    .custom-option-div input{
      width:100%;
      border-radius:10px;
      border:none;
      padding-left:10px;
      font-size:12px;
      height:35px;
    }
    .custom-option-div{
      margin-bottom:15px;
    }
    #createElement{
      background:green;
    }
    .reset-option{
      background:red;
      color:#fff;
    }
</style>



<div class="container benefit-container">
  <div class="row">
    <div class="col-md-6 left-one">
      <div class="benefit-div">
        <div class="benefit-option-div">
          <label for="" class="benefit-label">Select Benefit</label>
          <select name="" id="benefitID" class="form-control form-select">
            <option value="" selected> choose option</option>
            <option value="Hotel getaway: $8/User Min.100">Hotel getaway: $8/User Min.100</option>
            <option value="Partner Saving And Discount">Partner Saving And Discount</option>
          </select>
        </div>
        <div class="custom-option-buttons">
          <button type="button" id="createElement">Create</button>
          <button class="reset-option">Reset</button>
          <button class="custom-option">Custom</button>
        </div>
        <div class="custom-option-div">
          <input type="text" disabled placeholder="Enter Your benefit here">
        </div>
      </div>
      <div class="create-option"></div>
      <!-- <div class="same draggable" draggable="true">1</div> -->
    </div>
    <div class="col-md-6 right-one">
      <div class="benefit-div">
        <div class="benefit-option-div right-benefit-option-div" style="margin-bottom: 0px;">
          <label for="" class="benefit-label">Your Benefits</label>
        </div>
      </div>
      <div class="add-option">
        <div class="same permanent-benefit same-permanent-benefit">
          <div>Flat Cashback 5</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- this section is for the entering the amount and this section is also in different page  -->

<div class="container entering-value-container">
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-4 col-form-label">Initiation Fee :</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="inputPassword" placeholder="Enter Value">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-4 col-form-label">Annual Fee :</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="inputPassword" placeholder="Enter Value">
        </div>
      </div>

    </div>
    <div class="col-md-6">
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-4 col-form-label" >Monthly Fee :</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="inputPassword" placeholder="Enter Value">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-4 col-form-label">Surcharge Fee :</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="inputPassword" placeholder="Enter Value">
        </div>
      </div>
    </div>
    <div class="col-12 text-center customize-card-offer-fee">
      <button type="button">Submit</button>
    </div>
  </div>
</div>





<script>
  const createElement = document.querySelector("#createElement");
  createElement.addEventListener("click", e => {
    let elm = document.createElement("div");
    if (document.querySelector("#benefitID").disabled == true) {
      document.querySelector("#benefitID").value = "";
    } else {
      document.querySelector(".custom-option-div input").value = "";
    }

    elm.innerHTML = `<div class="same draggable added-option same-permanent-benefit" draggable="true">
    <div>${document.querySelector("#benefitID").value}</div>
    <div>${document.querySelector(".custom-option-div input").value}</div>
    </div>`;

    document.querySelector(".left-one").appendChild(elm);

    const draggables = document.querySelectorAll(".draggable");
    const addContainer = document.querySelectorAll(".add-option");

    document.querySelectorAll(".draggable").forEach(item => {
      item.addEventListener("dragstart", e => {
        item.classList.add("dragging");
      });
      item.addEventListener("dragend", e => {
        item.classList.remove("dragging");
      });
    });

    document.querySelectorAll(".add-option").forEach(item => {
      item.addEventListener("dragover", e => {
        e.preventDefault();
        const draggable = document.querySelector(".dragging");
        item.appendChild(draggable);
      });
    });


  })

  document.querySelector(".custom-option").addEventListener("click", e => {
    document.querySelector("#benefitID").setAttribute("disabled", 'true');
    document.querySelector(".custom-option-div").style.cssText += "display:block;";
    document.querySelector(".custom-option-div input").removeAttribute("disabled", 'true');
  });
  document.querySelector(".reset-option").addEventListener('click', e => {
    document.querySelector("#benefitID").removeAttribute("disabled");
    document.querySelector(".custom-option-div").style.cssText += "display:none;";
    document.querySelector(".custom-option-div input").setAttribute("disabled", 'true');

  })
</script>