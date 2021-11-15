import React from "react";
import mail from "../../../../images/mail.png";
import "./secondPart.scss";

function SecondPart() {
  const [user, setUser] = React.useState({
    name: "",
    email: "",
    message: "",
  });
  function onChange(event) {
    setUser({
      ...user,
      [event.target.name]: event.target.value,
    });
  }
  function submitForm(event) {
    event.preventDefault();
    const config = {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
        accept: 'application/json',
    },
      body: JSON.stringify(user),
    };
console.log(user)
    const url = "/api/v2/contact";

    fetch(url, config)
      .then((res) => res.json())
      .then((res) => {
        console.log(res);
        if (res.error) {
          alert(res.error);
        } else {
          alert(`User #${res.id} has been successfully added!`);
        }
      })
      .catch((e) => {
        console.error(e);
        alert("There was an error when adding the user.");
      });
  }
  return (
    <div>
      <div className="row d-flex justify-content-center align-items-center">
        <div className="col-md-5">
          <img src={mail} alt="mail" />
        </div>
        <div className="col-md-3">
          <form onSubmit={submitForm}>
            <div class="mb-3">
              <label htmlFor="name"> </label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Nom"
                onChange={onChange}
                value={user.name}
              />
            </div>
            <div class="mb-3">
              <label htmlFor="email"> </label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Email"
                onChange={onChange}
                value={user.email}
              />
            </div>
            <div class="mb-3">
              <label htmlFor="message"> </label>
              <textarea
                class="form-control"
                id="message"
                name="message"
                rows="3"
                placeholder="Votre message"
                onChange={onChange}
                value={user.message}
              ></textarea>
            </div>
            <button type="submit" value="send" class="btn w-100 sendButton">
              Envoyer
            </button>
          </form>
        </div>
      </div>
    </div>
  );
}
export default SecondPart;
