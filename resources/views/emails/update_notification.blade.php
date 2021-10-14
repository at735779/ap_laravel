こんばんは、{{$data_to_send[0]->name}}　さん<br><br>

{{$data_to_send[0]->date}}の熊本市の更新情報をお届けします<br><br>

@for($i = 0; $i < count($data_to_send); $i++)
  <a href = "{{ $data_to_send[$i]->url }}">{{ $data_to_send[$i]->title }}</a><br><br>
@endfor

以上が本日の更新情報になります<br>


