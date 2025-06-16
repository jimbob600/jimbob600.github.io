const auth = firebase.auth();

document.getElementById('loginForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  const email = document.getElementById('username').value;
  const password = document.getElementById('password').value;
  const msg = document.getElementById('message');

  try {
    await auth.signInWithEmailAndPassword(email, password);
    msg.textContent = "✅ Login successful!";
  } catch (error) {
    if (error.code === 'auth/user-not-found') {
      msg.textContent = "⚠️ User not found. Creating account...";
      try {
        await auth.createUserWithEmailAndPassword(email, password);
        msg.textContent = "✅ Account created and logged in!";
      } catch (err) {
        msg.textContent = "❌ " + err.message;
      }
    } else {
      msg.textContent = "❌ " + error.message;
    }
  }
});
