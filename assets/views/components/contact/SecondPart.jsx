import React, { useState } from 'react'
import mail from '../../../images/mail.png'

function SecondPart() {
  const messageObject = {
    nom: '',
    email: '',
    message: '',
  }
  const [message, setMessage] = useState(messageObject)

  const [errors, setErrors] = useState({})
  const [success, setSuccess] = useState('')
  const [send, setSend] = useState(false)

  function onChange(event) {
    setMessage({
      ...message,
      [event.target.name]: event.target.value,
    })
  }

  function alertErrors(field) {
    return field.map((error, index) => {
      return (
        <div key={index} className="alert alert-danger" role="alert">
          {error}
        </div>
      )
    })
  }
  async function submitForm(event) {
    setSend(true)
    event.preventDefault()
    const config = {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        accept: 'application/json',
      },
      body: JSON.stringify(message),
    }
    const url = '/api/v2/contact'

    const query = await fetch(url, config)
    const status = query.status
    const response = await query.json()

    if (status === 422) {
      setErrors(response.errors)
      setSuccess('')
    } else {
      setErrors({})
      setSuccess(response)
      setMessage(messageObject)
    }
    setSend(false)
  }

  return (
    <div>
      <div className="row d-flex justify-content-center align-items-center">
        <div className="col-md-5">
          <img src={mail} alt="mail" />
        </div>

        <div className="col-md-3">
          {success?.success ? (
            <div className="alert alert-success" role="alert">
              {success.success}
            </div>
          ) : (
            ''
          )}

          <form onSubmit={submitForm}>
            <div className="mb-3">
              {errors?.nom ? alertErrors(errors.nom) : ''}
              <label htmlFor="nom"> </label>
              <input
                type="text"
                className="form-control"
                id="nom"
                name="nom"
                placeholder="Nom"
                onChange={onChange}
                value={message.nom}
              />
            </div>
            <div className="mb-3">
              {errors?.email ? alertErrors(errors.email) : ''}
              <label htmlFor="email"> </label>
              <input
                type="email"
                className="form-control"
                id="email"
                name="email"
                placeholder="Email"
                onChange={onChange}
                value={message.email}
              />
            </div>
            <div className="mb-3">
              {errors?.message ? alertErrors(errors.message) : ''}
              <label htmlFor="message"> </label>
              <textarea
                className="form-control"
                id="message"
                name="message"
                rows="3"
                placeholder="Votre message"
                onChange={onChange}
                value={message.message}
              ></textarea>
            </div>
            {send ? (
                <div className="text-center">
              <div className="spinner-border text-primary" role="status">
                <span className="sr-only">Loading...</span>
              </div>
              <p> Envoi en cours...</p>
              </div>
            ) : (
              <button
                type="submit"
                value="send"
                className="btn w-100 sendButton"
              >
                Envoyer
              </button>
            )}
          </form>
        </div>
      </div>
    </div>
  )
}
export default SecondPart