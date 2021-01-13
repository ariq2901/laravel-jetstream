<table>
  <thead>
    <tr style="border: 1px solid #000000">
      <th>Category id</th>
      <th>Product title</th>
      <th>Product slug</th>
      <th>Product price</th>
      <th>Product image</th>
    </tr>
  </thead>
  <tbody>
    @foreach($laptops as $item)
      <tr>
        <td>{{ $item->category_id }}</td>
        <td>{{ $item->product_title }}</td>
        <td>{{ $item->product_slug }}</td>
        <td>{{ $item->product_price }}</td>
        <td>{{ $item->product_image }}</td>
      </tr>
    @endforeach
  </tbody>
</table>