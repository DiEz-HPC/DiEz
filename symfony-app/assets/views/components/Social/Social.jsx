import React, {useState, useEffect} from 'react';
import '../Social/social.scss';

function Social(props) {
    const [text, setText] = useState([...'nous suivre']);
    const {socials} = props;

    return (
        <div id={'social'} className="social">
            <p className="text-social">
                {text.map((letter, index) => {
                    return <span key={index}>{letter}</span>;
                }
                )}
            </p>

            <hr className="hr-social"/>

            {socials?.map((social, index) => {
                return (
                    <a key={index} href={social.url} target={'_blank'} className={index === 0 ? 'ms-3' : 'ms-4'}>
                        <i className={social.icon} />
                    </a>
                );
            })}
        </div>
    );
}

export default Social;
