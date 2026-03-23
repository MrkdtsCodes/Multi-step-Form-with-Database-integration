let stage1 = document.getElementById("stage1");
let stage2 = document.getElementById("stage2");
let stage3 = document.getElementById("stage3");

let next1 = document.getElementById("next1");
let next2 = document.getElementById("next2");
let back1 = document.getElementById("back1");
let back2 = document.getElementById("back2");
let form = document.getElementById("user_form");

next1.addEventListener("click", () => {
  stage1.classList.remove("d-block");
  stage1.classList.add("d-none");
  stage2.classList.remove("d-none");
  stage2.classList.add("d-block");
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

form.addEventListener("submit", function (event) {
  event.preventDefault();

  const rawData = new FormData(form);

  //   console.log(rawData);

  const objData = Object.fromEntries(rawData);
  //   console.log(objData);

  const rawJson = JSON.stringify(objData);

  //   console.log(rawJson);

  fetch("process.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: rawJson,
  })
    .then((response) => response.text()) // Wait for PHP to talk back
    .then((result) => {
      console.log("Server says: ", result); // See the kitchen's response in your browser console
    });
});
