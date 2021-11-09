export const timeToRead = (text, wordsPerMinute = 300) => {
  const words = text.split(/\s+/g);
  const minutes = words.length / wordsPerMinute;
  return Math.ceil(minutes);
};