const client = algoliasearch("L1O0IT5ES6", "1021f207b53f57f36c73d3fe2bc6a2e9");
const players = client.initIndex('products');
const teams = client.initIndex('categories');


autocomplete('#aa-search-input', {}, [
    {
      source: autocomplete.sources.hits(players, { hitsPerPage: 10 }),
      displayKey: 'Product_name',
      templates: {
        header: '<div class="aa-suggestions-category">products</div>',
        suggestion({_highlightResult}) {
        return `<a href="fproduct/${_highlightResult.id.value}"><span>${_highlightResult.Product_name.value}</span></a><span>${_highlightResult.Price.value}</span>`;
        }
      }
    },

 {
      source: autocomplete.sources.hits(teams, { hitsPerPage: 3 }),
      displayKey: 'category_name',
      templates: {
        header: '<div class="aa-suggestions-category">categories</div>',
        suggestion({_highlightResult}) {
          return `<a href="${_highlightResult.id.value}"><span>${_highlightResult.category_name.value}</span></a>`;
        }
      }
    }
]);