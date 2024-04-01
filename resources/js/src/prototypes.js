
Date.prototype.getWeek = function() {
  var onejan = new Date(this.getFullYear(), 0, 1);
  return Math.ceil((((this - onejan) / 86400000) + onejan.getDay() + 1) / 7);
};

String.prototype.capitalize = function(all, lower) {
  if(all) return (lower ? this.toLowerCase() : this).replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });
  return this.charAt(0).toUpperCase() + (lower ? this.slice(1).toLowerCase() : this.slice(1));
}

String.prototype.camel = function() {
  return this.replace(/(?:^\w|[A-Z]|\b\w)/g, function(word, index) {
    return index === 0 ? word.toLowerCase() : word.toUpperCase();
  }).replace(/\s+/g, '');
}

String.prototype.tuc = function() {
  return this.toUpperCase();
}

String.prototype.tlc = function() {
  return this.toLowerCase();
}

String.prototype.tcc = function() {
  return this.camel();
}

Number.prototype.format = function(n, x, s, c) {
  let re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
      num = this.toFixed(Math.max(0, ~~n));

  return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};

if (!Date.prototype.toRealString) {
  (function() {

    function pad(number) {
      if (number < 10) return '0' + number;
      return number;
    }

    Date.prototype.toRealString = function() {
      return this.getUTCFullYear() +
        '/' + pad(this.getUTCMonth() + 1) +
        '/' + pad(this.getUTCDate()) +
        ' ' + pad(this.getUTCHours()) +
        ':' + pad(this.getUTCMinutes()) +
        ':' + pad(this.getUTCSeconds());
    };

  }());
}
