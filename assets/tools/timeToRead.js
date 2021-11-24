export const timeToRead = (text, wordsPerMinute = 300) => {
  const words = text.split(/\s+/g);
  let minutes = words.length / wordsPerMinute;
  minutes = Math.ceil(minutes);
  let sentence = 'de lecture';
  if (minutes > 1) {
    sentence = minutes + ' minutes ' + sentence;
  } else if (minutes === 1) {
    sentence = minutes + ' minute ' + sentence;
  } else {
    sentence = 'moins d\'une minute ' + sentence;
  }
  return sentence;
};