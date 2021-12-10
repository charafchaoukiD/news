<html>
    <head>
        <title>View</title>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <style>
           .male
            {
                background-color: #18a5f2;
                border-style: none;
                padding: 6px 16px;
                color: white;
                border-radius: 4px;
                cursor: pointer;
            }
            .female
            {
                background-color: #f218d7;
                border-style: none;
                padding: 6px 16px;
                color: white;
                border-radius: 4px;
                cursor: pointer;
            }
            #img-container
            {
                width: 120px;
                height: 120px;
                border-radius: 60%;
                background-color: #f9f9f9;
                overflow: hidden;
            }
            .img-male
            {
                border: 2px solid #18a5f2;
            }
            .img-female
            {
                border: 2px solid #f218d7;
            }
            #img-container > img
            {
                width: 100%;
                height: 100%;
            }
            .title
            {
                font-size: 15pt;
                margin-top: 8px;
            }
            #load_btn
            {
                background: #662674;
                border-style: none;
                color: white;
                padding: 6px 39px;
                border-radius: 6px;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <br><br>
                
                <div class="container">
                    <div class="row">
                              <div class="col-md-12">
                                 <button id="load_btn" v-on:click="getArticles">Load More</button>
                              </div>
                              <div class="col-md-4 mt-2" v-for="article in articles">
                                 <div style="width:100%; height:240px;">
                                    <img v-bind:src="article.img" style="width:100%; height:100%;">
                                  </div>
                                 <span>{{article.publishedAt }}</span>
                                 <h3 class="title">{{ article.title }}</h3>
                             </div>
                    </div>
                </div>
        </div>
        
        <script type="text/javascript">
           var key = '133b88165fd9488bba9befefffd78a20';
            
           var vm = new Vue({
               el: '#app',
               data: {
                   articles : []
               },
               methods: {
                   getArticles: async function(){
                       const res = await fetch('https://newsapi.org/v2/everything?q=Apple&from=2021-12-10&sortBy=popularity&apiKey=133b88165fd9488bba9befefffd78a20');
                       const results = await res.json();
                             
                       for(let i = 0;i < results.articles.length; i++)
                       {
                           this.articles.push({title: results.articles[i].title,
                                               img:results.articles[i].urlToImage,
                                               publishedAt: results.articles[i].publishedAt});
                       }
                   }
               }
           });
            
           //Load data for first Time
            vm.getArticles();
        </script>
    </body>
</html>