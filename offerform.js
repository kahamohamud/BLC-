const input = document.querySelector('input[name="intake"]');
const date = new Date(input.value);
const month = date.toLocaleString('default', { month: 'short' }).toUpperCase();
const year = date.getFullYear();
const formattedDate = `${month} ${year}`;
input.value = formattedDate;
