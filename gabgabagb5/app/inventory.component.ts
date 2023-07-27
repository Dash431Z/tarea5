<!-- inventory.component.html -->
<div *ngFor="let product of products">
  <p>Nombre: {{ product.nombre_producto }}</p>
  <p>Cantidad: {{ product.cantidad }}</p>
  <p>Precio: {{ product.precio }}</p>
  <hr>
</div>

<h2>Agregar producto</h2>
<form (ngSubmit)="addProduct()">
  <label>
    Nombre:
    <input type="text" [(ngModel)]="newProduct.nombre_producto" name="nombre_producto">
  </label>
  <label>
    Cantidad:
    <input type="number" [(ngModel)]="newProduct.cantidad" name="cantidad">
  </label>
  <label>
    Precio:
    <input type="number" [(ngModel)]="newProduct.precio" name="precio">
  </label>
  <button type="submit">Agregar</button>
</form>
