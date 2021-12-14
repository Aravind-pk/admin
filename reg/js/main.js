$(function () {
  $("#form-total").steps({
    headerTag: "h2",
    bodyTag: "section",
    transitionEffect: "fade",
    enableAllSteps: true,
    stepsOrientation: "vertical",
    autoFocus: true,
    transitionEffectSpeed: 500,
    titleTemplate: '<div class="title">#title#</div>',
    labels: {
      previous: "Back Step",
      next: '<i class="zmdi zmdi-arrow-right"></i>',
      finish: '<i class="zmdi zmdi-pen"></i>',
      current: "",
    },
    onStepChanging: function (event, currentIndex, newIndex) {
      console.log(currentIndex);
      if (currentIndex > newIndex) {
        return true;
      }
      if (
        newIndex === 1 &&
        validateEmail($("#email").val()) &&
        validatePhNo($("#phone").val())
      ) {
        return true;
      }
      if (currentIndex === 1 && newIndex === 2) {
        return true;
      }
    },
  });
});

// ........................................validation

validateEmail = (email) => {
  var emailRegex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if (!emailRegex.test(email)) {
    document.getElementById("emailalert").style.display = "inline";
    return false;
  } else {
    return true;
  }
};

validatePhNo = (phone) => {
  console.log(phone);
  if (!(phone.length === 10)) {
    document.getElementById("phonealert").style.display = "inline";
    console.log(false);
    return false;
  } else {
    return true;
  }
};
