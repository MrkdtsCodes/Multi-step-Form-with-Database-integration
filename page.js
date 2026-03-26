let stage1 = document.getElementById("stage1");
let stage2 = document.getElementById("stage2");
let stage3 = document.getElementById("stage3");

let next1 = document.getElementById("next1");
let next2 = document.getElementById("next2");
let back1 = document.getElementById("back1");
let back2 = document.getElementById("back2");
let submitbtnn = document.getElementById("submit_bttn");

next1.addEventListener("click", () => {
  let error_container = stage1.querySelectorAll(".error_container");
  let inputs = stage1.querySelectorAll("input, select");

  const validnames = /^[a-zA-Z]+$/;

  error_container.forEach((container) => {
    ///pang alis clear ng mga text field
    container.innerText = "";
  });

  let errorBucket = [];

  inputs.forEach((fields, index) => {
    let inputVals = fields.value.trim();

    if (inputVals === "") {
      errorBucket.push({
        boxNumber: index,
        message: "This is a required field*",
      });
    } else {
      if (fields.type === "text") {
        if (validnames.test(inputVals) === false) {
          errorBucket.push({ boxNumber: index, message: "Maling format" });
        }
      }
    }
  });

  console.table(errorBucket);

  if (errorBucket.length > 0) {
    errorBucket.forEach((errorItem) => {
      let targetContainer = error_container[errorItem.boxNumber];
      targetContainer.innerText = errorItem.message;
      targetContainer.style.color = "red";
    });
    console.log("Validation failed. Fix errors first.");
  } else {
    console.log("Success! Proceed to Stage 2.");
    console.log();
    stage1.classList.remove("d-block");
    stage1.classList.add("d-none");
    stage2.classList.remove("d-none");
    stage2.classList.add("d-block");
  }
});

next2.addEventListener("click", () => {
  let error_container = stage2.querySelectorAll(".error_container");
  let inputfields = stage2.querySelectorAll("input");

  let errorbucket = [];
  const emailpattern = /^\w[a-zA-Z0-9]*[@]gmail\.com$/;
  const validnum = /^[0-9]{11}$/;

  error_container.forEach((container) => {
    ///pang alis clear ng mga text field
    container.innerText = "";
  });

  inputfields.forEach((inputs, index) => {
    let inputvals = inputs.value.trim();

    if (inputvals === "") {
      errorbucket.push({
        boxNumber: index,
        message: "this is a required Field",
      });
    } else {
      if (inputs.type === "email") {
        if (emailpattern.test(inputvals) === false) {
          errorbucket.push({ boxNumber: index, message: "Maling hinid email" });
        }
      }
      if (inputs.type === "tel") {
        if (validnum.test(inputvals) === false) {
          errorbucket.push({
            boxNumber: index,
            message: "Maling hindi number",
          });
        }
      }
    }
  });

  console.table(errorbucket);

  if (errorbucket.length > 0) {
    errorbucket.forEach((errorItem) => {
      let targetContainer = error_container[errorItem.boxNumber];
      targetContainer.innerText = errorItem.message;
      targetContainer.style.color = "red";
    });
    console.log("Validation failed. Fix errors first.");
  } else {
    console.log("Success! Proceed to Stage 2.");
    console.log();
    stage2.classList.remove("d-block");
    stage2.classList.add("d-none");

    stage3.classList.remove("d-none");
    stage3.classList.add("d-block");
  }
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

submitbtnn.addEventListener("click", (e) => {
  let error_container = stage3.querySelectorAll(".error_container");
  let form = document.getElementById("user_form");
  const zipregex = /^[0-9]{4}$/;
  const validnames = /^[a-zA-Z]+$/;
  let inputfields = stage3.querySelectorAll("input");

  let errorbucket = [];

  error_container.forEach((container) => {
    ///pang alis clear ng mga text field
    container.innerText = "";
  });

  inputfields.forEach((inputs, index) => {
    let inputvals = inputs.value.trim();

    if (inputvals === "") {
      errorbucket.push({
        boxNumber: index,
        message: "this is a required Field",
      });
    } else {
      if (inputs.type === "text") {
        if (validnames.test(inputvals) === false) {
          errorbucket.push({ boxNumber: index, message: "Maling hinid email" });
        }
      }
      if (zipregex.type === "") {
        if (zipregex.test(inputvals) === false) {
          errorbucket.push({
            boxNumber: index,
            message: "Maling hindi number",
          });
        }
      }
    }
  });

  console.table(errorbucket);

  if (errorbucket.length > 0) {
    errorbucket.forEach((errorItem) => {
      let targetContainer = error_container[errorItem.boxNumber];
      targetContainer.innerText = errorItem.message;
      targetContainer.style.color = "red";
    });
    console.log("Validation failed. Fix errors first.");
  } else {
    console.log("Success! Proceed to Stage 2.");

    //para di mag reload  yung browser natin

    const fd = new FormData(form);

    // dito na ginawang object parang json format na dito
    const objData = Object.fromEntries(fd);

    ///passing it as json na talaga parang associative array na siya dito
    const rawJson = JSON.stringify(objData);

    fetch("process.php", {
      method: "POST",

      headers: {
        "Content-Type": "application/json; charset=utf-8",
      },
      body: rawJson,
    })
      .then(function (response) {
        return response.json(); //pwedeng json to .json()
      })
      .then(function (data) {
        console.log(data);
      })
      .catch(function (error) {
        console.log(error);
      });
  }
});
