@extends("layouts.app_sub")
        @section("content")

            絵を描きます
            <input type="color" id="color">        
            <button id="clear_btn">クリアー</button>
            <button id="download">保存</button>
            <canvas id="drowarea" width="640" height="480" style="border:1px solid #555;"></canvas>
    
</div>
        @endsection