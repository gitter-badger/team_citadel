@extends('master')

    @section('header')
    @stop

    @section('content')
        <div  class="">
            <div class="item"><h1>1</h1></div>
            <div class="item"><h1>2</h1></div>
            <div class="item"><h1>3</h1></div>
            <div class="item"><h1>4</h1></div>
            <div class="item"><h1>5</h1></div>
            <div class="item"><h1>6</h1></div>
            <div class="item"><h1>7</h1></div>
            <div class="item"><h1>8</h1></div>
            <div class="item"><h1>9</h1></div>
            <div class="item"><h1>10</h1></div>
            <div class="item"><h1>11</h1></div>
            <div class="item"><h1>12</h1></div>
            <div class="item"><h1>13</h1></div>
            <div class="item"><h1>14</h1></div>
            <div class="item"><h1>15</h1></div>
            <div class="item"><h1>16</h1></div>
            <div class="item"><h1>17</h1></div>
            <div class="item"><h1>18</h1></div>
            <div class="item"><h1>19</h1></div>
            <div class="item"><h1>20</h1></div>
        </div>
    @stop

    @section('scripts')
        @parent
        <script type="text/javascript" src="{{asset('js/carousel.js')}}"></script>
    @stop