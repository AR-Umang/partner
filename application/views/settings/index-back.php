
<!-- this is the code for the next page but for now we create this page here  -->

<style>
  .benefit-container {
    margin-top: 50px;
    background: #8080803b;
  }

  .same {
    background: #fff;
    height: 50px;
    width: 80%;
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .draggable {
    cursor: move;
  }

  .draggable.dragging {
    opacity: 0.5;
    cursor: auto;
  }

  .benefit-label {
    font-size: 12px;
    font-weight: 600;
    color: #000;
  }

  .custom-option-div {
    display: none;
  }
</style>




<div class="container benefit-container">
  <div class="row">
    <div class="col-md-6 left-one">
      <div class="benefit-div">
        <label for="" class="benefit-label">Benefit</label>
        <select name="" id="benefitID" class="form-control form-select">
          <option value="" selected> choose option</option>
          <option value="Hotel getaway: $8/User Min.100">Hotel getaway: $8/User Min.100</option>
          <option value="Partner Saving And Discount">Partner Saving And Discount</option>
        </select>
        <button class="custom-option">Custom</button>
        <button class="reset-option">Reset</button>
        <div class="custom-option-div"><input type="text" disabled></div>
      </div>
      <button type="button" id="createElement">Create Element</button>
      <div class="create-option"></div>
      <!-- <div class="same draggable" draggable="true">1</div> -->
    </div>
    <div class="col-md-6">
      <div class="add-option">
        <div class="same">2</div>
      </div>
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

    elm.innerHTML = `<div class="same draggable" draggable="true">
    <div>${document.querySelector(".benefit-label").innerText}</div>
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




<!-- this section is for the entering the amount and this section is also in different page  -->
<style>
  .entering-value-container {
    margin-top: 50px;
    background: #8080803b;

  }
</style>

<div class="container entering-value-container">
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Initiation Fee</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Annual Fee</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="inputPassword">
        </div>
      </div>

    </div>
    <div class="col-md-6">
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Monthly Fee</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="inputPassword">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Surcharge Fee</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="inputPassword">
        </div>
      </div>
    </div>
    <button type="button">Submit</button>
  </div>
</div>