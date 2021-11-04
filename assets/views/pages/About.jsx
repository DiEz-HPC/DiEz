import React from 'react';
import FirstPart from '../components/About/First-Part/FirstPart';
import Skill from '../components/About/Skill/Skill';
import Staff from '../components/About/Staff/Staff';

function About() {
    return (
        <div className={'about'}>
            <FirstPart />
            <div className="mb-4">
                <Skill
                    reverse={'-reverse'}
                    img={'https://www.informatiquenews.fr/wp-content/uploads/2014/05/php-web-development.png'}
                    title={'Web design & developement'}
                    textSide={'text-right'}
                />
                <Skill
                    img={'https://www.50a.fr/img/upload/react.png'}
                    title={'Web design & developement'}
                    textSide={'text-left'}
                />
            </div>
            <Staff />
        </div>
    );
}

export default About;
