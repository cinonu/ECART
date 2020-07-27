const client = algoliasearch("L1O0IT5ES6", "1021f207b53f57f36c73d3fe2bc6a2e9");
const players = client.initIndex('products');
const teams = client.initIndex('Category');

autocomplete('#aa-search-input', {}, [
    {
      source: autocomplete.sources.hits(players, { hitsPerPage: 3 }),
      displayKey: 'Product_name',
      templates: {
        header: '<div class="aa-suggestions-category">products</div>',
        suggestion({_highlightResult}) {
        return `<span>${_highlightResult.Product_name.value}</a></span><span>${_highlightResult.Price.value}</span>`;
        }
      }
    },
    
   
])  .on('autocomplete:selected', function (event, suggestion, dataset) {
            window.location.href = window.location.origin + '/harsh/public/fproduct/' + suggestion.id;
            enterPressed = true;
  });