const removeTopImage = () => {
  const recentImg = localStorage.getItem("applyLogoImg");
  document.querySelector(".top-logo-image").removeAttribute("src");
  localStorage.removeItem("applyLogoImg");
  document.querySelector("#topLogoFilePicker").value = "";
};

const removeLeftSectionImage = () => {
  const recentImg = localStorage.getItem("applyBgImg");
  document.querySelector(".left-side-top-arrow").removeAttribute("style");
  localStorage.removeItem("applyBgImg");
  document.querySelector("#LeftSectionFilePicker").value = "";
};

const resetCardStyle = () => {
  removeTopImage();
  removeLeftSectionImage();
  document.querySelector(
    ".left-side-top-arrow"
  ).style.cssText += `background:#DDDDDD;`;
  document.querySelector("#arrowColor").style.cssText += `background:#707070`;
  document.querySelector(".left-side-arrow").style.cssText += `background:#fff`;
  document.querySelector("#LeftSectionColorPicker").value = "#DDDDDD";
  document.querySelector("#arrowColorPicker").value = "#707070";
  document.querySelector("#RightSectionColorPicker").value = "#fff";
  document.querySelector("#visaPath").style.cssText += "fill:#1434cb";
};

document.addEventListener("DOMContentLoaded", () => {
  document.querySelector("#arowColorBtn").addEventListener("click", () => {
    let color = document.querySelector("#arrowColorPicker").value;
    document.querySelector(
      "#arrowColor"
    ).style.cssText += `background:${color};`;
  });
  document.querySelector("#LeftSectionBtn").addEventListener("click", () => {
    console.log("hsdfsuignhf");
    let color = document.querySelector("#LeftSectionColorPicker").value;
    document.querySelector(
      ".left-side-top-arrow"
    ).style.cssText += `background:${color};`;
  });
  document.querySelector("#RightSectionBtn").addEventListener("click", () => {
    let color = document.querySelector("#RightSectionColorPicker").value;
    document.querySelector(
      ".left-side-arrow"
    ).style.cssText += `background:${color};`;
  });

  // =============== code for upload image starts =============================

  document
    .querySelector("#LeftSectionFilePicker")
    .addEventListener("change", () => {
      let imgurl = document.querySelector("#LeftSectionFilePicker");
      const reader = new FileReader();
      reader.addEventListener("load", () => {
        localStorage.setItem("applyBgImg", reader.result);
      });
      reader.readAsDataURL(imgurl.files[0]);
    });
  document
    .querySelector("#LeftSectionFileBtn")
    .addEventListener("click", () => {
      const recentImg = localStorage.getItem("applyBgImg");
      document
        .querySelector(".left-side-top-arrow")
        .setAttribute("style", `background-image: url('${recentImg}')`);
    });
  document
    .querySelector("#LeftSectionDeleteBtn")
    .addEventListener("click", removeLeftSectionImage);
  // =============== code for upload image ends =============================

  // =============== code for upload image starts =============================

  document
    .querySelector("#topLogoFilePicker")
    .addEventListener("change", () => {
      let imgurl = document.querySelector("#topLogoFilePicker");
      const reader = new FileReader();
      reader.addEventListener("load", () => {
        localStorage.setItem("applyLogoImg", reader.result);
      });
      reader.readAsDataURL(imgurl.files[0]);
    });
  document.querySelector("#topLogoFileBtn").addEventListener("click", () => {
    const recentImg = localStorage.getItem("applyLogoImg");
    document
      .querySelector(".top-logo-image")
      .setAttribute("src", `${recentImg}`);
  });
  document
    .querySelector("#topLogoDeleteBtn")
    .addEventListener("click", removeTopImage);
  // =============== code for upload image ends =============================

  document
    .querySelector(".customize-card-popup-slider-open .customize-card-button")
    .addEventListener("click", () => {
      document.querySelector(".customize-popup-master-wrapper").style.cssText =
        "right: 0; transition: 0.7s;";
        document.body.classList.add('customize-card-slider-overflow');
    });

  document
    .querySelector(".customize-card-popup-slider-close .cancel-btn")
    .addEventListener("click", () => {
      let aaaa = document.querySelector(
        ".customize-card-popup-slider-close .cancel-btn"
      );
      document.querySelector(".customize-popup-master-wrapper").style.cssText =
        "right: -110%; transition: 0.7s;";
        document.body.classList.remove('customize-card-slider-overflow');
    });
});

//   code for tilt the image

let tiltButton = document.querySelector(".tilt-button");
let count = 0;
tiltButton.addEventListener("click", (e) => {
  count++;
  document.querySelector(
    ".customize-credit-card-wrapper"
  ).style.cssText += `transform:rotate(${count * 90}deg)`;
  document.querySelector(".customize-credit-card-wrapper").style.cssText +=
    "transition:0.5s";
  tiltButton.style.cssText += `transform:rotate(${count * 90}deg)`;
  tiltButton.style.cssText += "transition:0.5s";
});

let ResetButton = document.querySelector(".reset-button");

ResetButton.addEventListener("click", resetCardStyle);

document.querySelector(".visa-select-box").addEventListener("change", () => {
  if (document.querySelector(".visa-select-box").value == "White") {
    document.querySelector("#visaPath").style.cssText += "fill:#fff";
  }
  if (document.querySelector(".visa-select-box").value == "Black") {
    document.querySelector("#visaPath").style.cssText += "fill:#000";
  }
  if (document.querySelector(".visa-select-box").value == "Purple") {
    document.querySelector("#visaPath").style.cssText += "fill:#800080";
  }
});

let eachLeftOption = document.querySelectorAll(".left-customize-div > div");
eachLeftOption.forEach((item) => {
  item.addEventListener("click", (e) => {
    eachLeftOption.forEach((items) => {
      items.classList.remove("active-option");
    });
    item.classList.add("active-option");
    document.querySelectorAll(".right-common-content").forEach((elm) => {
      elm.style.cssText += "display:none;";
    });
  });
});

document.querySelector(".left-top-logo-div").addEventListener("click", (e) => {
  document.querySelector(".right-top-logo-div").style.cssText +=
    "display:block;";
});

document
  .querySelector(".left-left-side-image-div")
  .addEventListener("click", (e) => {
    document.querySelector(".right-left-side-image-div").style.cssText +=
      "display:block;";
  });

document
  .querySelector(".left-left-side-color-div")
  .addEventListener("click", (e) => {
    document.querySelector(".right-left-side-color").style.cssText +=
      "display:block;";
  });

document.querySelector(".left-arrow-div").addEventListener("click", (e) => {
  document.querySelector(".right-arrow-div").style.cssText += "display:block;";
});

document
  .querySelector(".left-right-color-div")
  .addEventListener("click", (e) => {
    document.querySelector(".right-right-color-div").style.cssText +=
      "display:block;";
  });

document
  .querySelector(".left-visa-color-div")
  .addEventListener("click", (e) => {
    document.querySelector(".right-visa-color-div").style.cssText +=
      "display:block;";
  });

//>>>>>>>>>>>>>>>>>>>>>>>>>>>this is the api section for the customize credit card<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<

const getCustomizeCardData = (event) => {
  let cardLogo = document.querySelector("#topLogoFilePicker").files;
  let leftImage = document.querySelector("#LeftSectionFilePicker").files;

  var formData = new FormData();
  formData.append("cardLogo", cardLogo[0]);
  formData.append("cardImage", "default.png");
  formData.append("leftImage", leftImage[0]);
  formData.append("cardName", document.querySelector("#cardProgramName").value);
  formData.append("cardDesc", document.querySelector("#description").value);
  formData.append(
    "leftColor",
    document.querySelector("#LeftSectionColorPicker").value
  );
  formData.append(
    "arrowColor",
    document.querySelector("#arrowColorPicker").value
  );
  formData.append(
    "rightColor",
    document.querySelector("#RightSectionColorPicker").value
  );
  let thePath = location.href;
  formData.append("visaColor", document.querySelector("#cardVisaColor").value);
  formData.append("partnerId", thePath.substring(thePath.lastIndexOf('/') + 1));

  fetch("https://artechnity.in/kaped-new/api/api/customizeCard", {
    method: "POST",
    body: formData,
  })
    .then((response) => {
      return response.text();
    })
    .then((data) => {
      let response = JSON.parse(data);
      window.location.href =
        "https://artechnity.in/partner/offers/PR2022QZRBL/" + response.cardId;
    })
    .catch((error) => {
      console.log(error);
    });
};

let nextStepButton = document.querySelector("#nextStepButton");
nextStepButton.addEventListener("click", () => {
  getCustomizeCardData();
});

console.log(location.href);
