let stage1 = document.getElementById("stage1");
let stage2 = document.getElementById("stage2");
let stage3 = document.getElementById("stage3");

let next1 = document.getElementById("next1");
let next2 = document.getElementById("next2");
let back1 = document.getElementById("back1");
let back2 = document.getElementById("back2");
let form = document.getElementById("user_form");

next1.addEventListener("click", (event) => {
  event.preventDefault();
  //kunin yung inputs
  let fnameVal = document.getElementById("fName");
  let mName = document.getElementById("Mname");
  let lName = document.getElementById("lname");
  let bdate = document.getElementById("Bdate");
  let gender = document.getElementById("gender");

  //lagayan ng mga nakolektang values
  let stage1Vals = [
    fnameVal.value,
    mName.value,
    lName.value,
    bdate.value,
    gender.value,
  ];

  console.table(stage1Vals);

  let rawDAta = {}; //object

  stage1Vals.forEach((item, index) => {
    rawDAta[index] = item;
  });

  rawDAta["form_stage"] = 1;

  // console.log(rawDAta);

  //rawdata gawin nating JSON at ipasok sa variable named rawJson
  let rawJson = JSON.stringify(rawDAta);

  fetch("process.php", {
    //ipasa sa php gamit fetch
    method: "POST",
    headers: {
      // Sinabihan natin ang server na JSON ito
      "Content-Type": "application/json",
    },
    body: rawJson,
  })
    .then((response) => response.json())
    .then((errorBucket) => {
      let error_container = stage1.querySelectorAll(".error_container");

      //clear yung erro pag priness yung next para icheck kung may new erro ulit
      error_container.forEach((containers) => {
        ///alisin lahat laman ng error values containers
        containers.textContent = "";
      });

      //kinuha natin yung response sa php
      if (errorBucket.length > 0) {
        //tumatanggap ng reply ng server

        console.table(errorBucket);

        errorBucket.forEach((errors) => {
          error_container.forEach((containers) => {
            if (errors.fieldName === containers.getAttribute("name")) {
              containers.textContent = errors.error;
            }
          });
        });
      } else if (errorBucket.length == 0) {
        //last stage to kapag nag true lahat
        stage1.classList.remove("d-block");
        stage1.classList.add("d-none");
        stage2.classList.remove("d-none");
        stage2.classList.add("d-block");
      }
    })
    .catch((error) => console.error("May error:", error));
});

next2.addEventListener("click", (event) => {
  event.preventDefault();

  //pag kuha ng inputs
  let email_inpt = document.getElementById("email");
  let phone_inpt = document.getElementById("phone");

  //pagkuha ng values/onjects
  let obj_vals = {
    form_stage: 2,
    email: email_inpt.value,
    phone: phone_inpt.value,
  };

  //turning it into JSon
  let rawJson = JSON.stringify(obj_vals);

  //fetch request
  fetch("process.php", {
    method: "POST",
    headers: {
      // Sinabihan natin ang server na JSON ito
      "Content-Type": "application/json",
    },
    body: rawJson,
  })
    .then((response) => response.json())
    .then((errorbucks) => {
      let error_container = stage2.querySelectorAll(".error_container");

      error_container.forEach((containers) => {
        ///alisin lahat laman ng error values containers
        containers.textContent = "";
      });

      //kinuha natin yung response sa php
      if (errorbucks.length > 0) {
        //tumatanggap ng reply ng server

        console.table(errorbucks);

        errorbucks.forEach((errors) => {
          error_container.forEach((containers) => {
            if (errors.fieldName === containers.getAttribute("name")) {
              containers.textContent = errors.error;
            }
          });
        });
      } else if (errorbucks.length == 0) {
        //last stage to kapag nag true lahat
        stage2.classList.remove("d-block");
        stage2.classList.add("d-none");
        stage3.classList.remove("d-none");
        stage3.classList.add("d-block");
      }
    })
    .catch((error) => console.error("May error:", error));

  //reply/validations
});

back1.addEventListener("click", () => {
  stage2.classList.remove("d-block");
  stage2.classList.add("d-none");

  stage1.classList.remove("d-none");
  stage1.classList.add("d-block");
});

back2.addEventListener("click", () => {
  stage3.classList.remove("d-block");
  stage3.classList.add("d-none");

  stage2.classList.remove("d-none");
  stage2.classList.add("d-block");
});

form.addEventListener("click", () => {
  let street_inpt = document.getElementById("street");
  let barangay_inpt = document.getElementById("barangay");
  let city_inpt = document.getElementById("city");
  let province_inpt = document.getElementById("province");
  let zip_inpt = document.getElementById("zipCode");

  let objData = {
    street: street_inpt.value,
    barangay: barangay_inpt.value,
    city: city_inpt.value,
    province: province_inpt.value,
    zipCode: zip_inpt.value,
  };

  //turning it into JSon
  let rawJson = JSON.stringify(objData);

  //fetch request
  fetch("process.php", {
    method: "POST",
    headers: {
      // Sinabihan natin ang server na JSON ito
      "Content-Type": "application/json",
    },
    body: rawJson,
  })
    .then((response) => response.json())
    .then((errorbucks) => {
      let error_container = stage2.querySelectorAll(".error_container");

      error_container.forEach((containers) => {
        ///alisin lahat laman ng error values containers
        containers.textContent = "";
      });

      //kinuha natin yung response sa php
      if (errorbucks.length > 0) {
        //tumatanggap ng reply ng server

        console.table(errorbucks);

        errorbucks.forEach((errors) => {
          error_container.forEach((containers) => {
            if (errors.fieldName === containers.getAttribute("name")) {
              containers.textContent = errors.error;
            }
          });
        });
      } else if (errorbucks.length == 0) {
      }
    })
    .catch((error) => console.error("May error:", error));
});
