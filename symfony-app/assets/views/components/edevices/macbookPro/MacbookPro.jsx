import React from "react";
import PropTypes from "prop-types";
import './macbookPro.scss'

function MacbookPro(props) {

    const {image, alt, scale} = props;
    const style = {
        transform: `scale(${scale / 100})`
    }

    return (

            <div className="device device-macbook-pro device-spacegray"  style={style}>
                <div className="device-frame">
                    <img className="device-content" src={image} alt={alt}/>
                </div>
                <div className="device-stripe" />
                <div className="device-header" />
                <div className="device-sensors" />
                <div className="device-btns" />
                <div className="device-power" />
            </div>

    )
}

MacbookPro.propTypes = {
    image: PropTypes.string.isRequired,
    alt: PropTypes.string.isRequired,
    scale: PropTypes.number.isRequired,
}

export default MacbookPro;