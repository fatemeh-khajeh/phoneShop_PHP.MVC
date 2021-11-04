<center ><h1 style="margin-top: 5%" >Liste des articles</h1></center>
<?php foreach ($articles as $article): ?>

        <div >
             
            <div class=" card"  style="width:280px; float: left; margin-left:5%; margin-top: 5%" >
                <div class="card-header"><h2 style="text-align: center;"><?php echo $article['nom']; ?> </h2></div>
                <div class="card-body"><a href="articles/detail/<?=$article['idproduit']; ?>"><img src="images/<?php echo $article['photo']; ?>" width="250px" height="280px"   ></a></div>
                <div class="card-footer"><h2><?php echo $article['prix']; ?></h2></div> 
                <div class="card-footer"><a href="articles/detail/<?=$article['idproduit']; ?>"><h2>Detail</h2></a></div> 
                <div class="card-footer"><a href="articles/detail/<?=$article['idproduit']; ?>"><h2>Ajouter au Panier</h2></a></div>   
            </div>  
        </div>

<?php endforeach; ?>