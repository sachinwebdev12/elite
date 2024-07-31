let passwordInput = document.getElementById("password");
let passwordStrengths = document.querySelectorAll(".password-strength");
let text = document.getElementById("strength-text"); // Assuming there's an element to display the strength text
let footer = document.getElementById("downloadLink");
let predefinedPassword = "1234567890"; // Define your predefined password

passwordInput.addEventListener("input", function (event) {
  let password = event.target.value;
  if (password === predefinedPassword) {
    // If the input password matches the predefined password
    footer.style.display = "block"; // Show the footer
    passwordStrengths.forEach((passwordStrength) => {
      passwordStrength.style.background = `conic-gradient(#12ff12 360deg, #1115 360deg)`; // Full green circle
    });
    text.textContent = "Password Matched!";
    text.style.color = "#12ff12"; // Green color
    
  } else {
    footer.style.display = "none";
    let strength = Math.min(password.length, 12);
    let degree = strength * 30; // Calculate degree value based on password strength
    let gradientColor = strength <= 4 ? "#ff2c1c" : strength <= 8 ? "#ff9800" : "#12ff12";
    let strengthText = strength <= 4 ? "Weak" : strength <= 8 ? "Medium" : "Strong";

    passwordStrengths.forEach((passwordStrength) => {
      passwordStrength.style.background = `conic-gradient(${gradientColor} ${degree}deg, #1115 ${degree}deg)`;
    });
    text.textContent = strengthText;
    text.style.color = gradientColor;
  }
});
