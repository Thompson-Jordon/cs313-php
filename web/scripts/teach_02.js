// code for click me button
// let btn1 = document.getElementById("btn1");
// btn1.addEventListener("click", () => {
//   alert("Clicked!");
// });

// Click button with jQuery
$("#btn1").click(()=> {
   alert("Clicked!");
});

// Change color function vanilla JS
// let btnColor = document.getElementById("btnColor");
// btnColor.addEventListener("click", ()=> {
//    let color = document.getElementById("txtColor").value;
//    let div = document.getElementById("div1");
//    div.style.backgroundColor = color;
// });

// Change color using jQuery
$("#btnColor").click(() => {
  let color = $("#txtColor").val();
  $("#div1").css("background-color", color);
});

// toggle div
$("#toggle").click(()=>{
   $("#div3").fadeToggle(2500);
})