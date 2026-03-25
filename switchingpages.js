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

  // console.log(rawDAta);

  let rawJson = JSON.stringify(rawDAta); //rawdata gawin nating JSON at ipasok sa variable named rawJson

  //ipasa sa php gamit fetch
  fetch("process.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json", // Sinabihan natin ang server na JSON ito
    },
    body: rawJson,
  })
    .then((response) => response.json())
    .then((errorBucket) => {
      if (errorBucket.length > 0) {
        //iidisplay ang binalik na error
        //decide if pupunta sa stage 2 or not
        errorBucket.forEach((errors) => {
          if (errors.fieldName === fnameVal.name) {
            let error_container = document.getElementById("mark");

            error_container.textContent = errors.error;
          } else {
          }
        });
      } else {
      }
    })
    .catch((error) => console.error("May error:", error));

  //last stage to kapag nag true lahat
  // stage1.classList.remove("d-block");
  // stage1.classList.add("d-none");
  // stage2.classList.remove("d-none");
  // stage2.classList.add("d-block");
});

next2.addEventListener("click", () => {
  stage2.classList.remove("d-block");
  stage2.classList.add("d-none");

  stage3.classList.remove("d-none");
  stage3.classList.add("d-block");
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
