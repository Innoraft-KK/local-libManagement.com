const form = document.querySelector('form');
const firstNameInput = document.querySelector('#fname');
const lastNameInput = document.querySelector('#lname');
const emailInput = document.querySelector('#email');
const phoneInput = document.querySelector('#phone');
const passwordInput = document.querySelector('#password');
const confirmpasswordInput = document.querySelector('#confirmpassword');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent form submission

  // validate inputs
  const firstName = firstNameInput.value.trim();
  const lastName = lastNameInput.value.trim();
  const phoneValue = phoneInput.value;
  const emailValue = emailInput.value;
  const passwordValue = passwordInput.value;
  const confirmpasswordValue = confirmpasswordInput.value;
  const firstNamePattern = /^[A-Za-z]+$/;
  const lastNamePattern = /^[A-Za-z]+$/;
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const phonePattern = /^\+91[1-9]\d{9}$/;

  if (!firstNamePattern.test(firstName)) {
    alert('First name should contain only alphabets');
    firstNameInput.focus();
    return;
  }

  if (!lastNamePattern.test(lastName)) {
    alert('Last name should contain only alphabets');
    lastNameInput.focus();
    return;
  }

  if (!emailPattern.test(emailValue)) {
    alert('Enter a valid email id');
    emailInput.focus()
    return;
  }

  if (!phonePattern.test(phoneValue)) {
    alert('Enter a valid Indian phone number starting with +91 and having 10 digits');
    phoneInput.focus()
    return;
  }

  if (passwordValue!=confirmpasswordValue) {
    alert("Password and confirm password do not match!");
    passwordInput.focus()
    return;
  }

    // form is valid, submit it
    form.submit();
  });
