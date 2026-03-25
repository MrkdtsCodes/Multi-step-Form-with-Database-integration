//need muna kunin yung forms
let form = document.getElementById("user_form");

form.addEventListener("submit", function (event) {
  //para di mag reload  yung browser natin
  event.preventDefault();

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
});
