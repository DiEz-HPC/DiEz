import React from 'react';

function TextBox(props) {
    return (
        <>
            <h2> {props.title} </h2>
            <h3>
                {props.subtitle}
            </h3>
            <p>
               {props.text}
            </p>
        </>
    );
}

export default TextBox;