<?php 
session_start();
include('connect.php');
$select="SELECT * FROM seat";
        $ret=mysql_query($select);
        $_SESSION['query']=$ret;
        $query=$_SESSION['query'];
        $seatcount=mysql_num_rows($ret);
if (isset($_POST['btnbook'])) 
{
    foreach($_REQUEST['selectseat'] as $selected)
    {
        $insert="INSERT INTO seat(SeatName) VALUES('$selected')";
        $seatret=mysql_query($insert) or die(mysql_error());

    }
}

?>
<html>
<head>
    <title>Seating</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
        input
        {
            width: 8bpx;
            border: none;
        }
        li
        {
            list-style: none;
        }
    </style>
 </head>
    <script type="text/javascript" src="jquery.js"></script> 
    <script type="text/javascript" src="jquery.seat-charts.min.js"></script> 
    <script type="text/javascript">
        
       var data =     {
    "who": "RSNO",
    "what": "An American Festival",
    "when": "2ba3-b2-b8 a9:3b",
    "where": "User Hall - Main Auditorium",
    "seats": [
        "bbbbbbbbbbbbbbbbbbaaaaaaaaaaaaaabbbbbbbbbbbbbbbbbb",
        "bbbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbb",
        "bbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbb",
        "bbbbbbbbbbbbbaaaaaaaaaaaaaaaaaaaaaaaaabbbbbbbbbbbb",
        "bbbbbbbbbaabbaaaaaaaaaaaaaaaaaaaaaaaabbaabbbbbbbbb",
        "bbbbbbbaaaabbaaaaaaaaaaaaaaaaaaaaaaabbaaaabbbbbbbb",
        "bbbbbaaaaaabbaaaaaaaaaaaaaaaaaaaaaaaabbaaaaaabbbbb",
        "bbbbaaaaaaabbaaaaaaaaaaaaaaaaaaaaaaabbaaaaaaabbbbb",
        "bbbaaaaaaaaabbaaaaaaaaaaaaaaaaaaaaaabbaaaaaaaaabbb",
        "bbaaaaaaaaaabbaaaaaaaaaaaaaaaaaaaaabbaaaaaaaaaabbb",
        "bbaaaaaaaaaaabbaaaaaaaaaaaaaaaaaaaabbaaaaaaaaaaabb",
        "aaaaaaaaaaaabbaaaaaaaaaaaaaaaaaaaaabbaaaaaaaaaaaab",
        "baaaaaaaaaaaabbaaaaaaaaaaaaaaaaaaaabbaaaaaaaaaaaab",
        "baaaaaaaaaaaabbaaaaaaaaaaaaaaaaaaabbaaaaaaaaaaaabb",
        "bbbbbbbbbbbbbbbbaaaaaaaaaaaaaaaaaabbbbbbbbbbbbbbbb",
        "baaaaaaaaaaaaabbaaaaaaaaaaaaaaaaabbaaaaaaaaaaaaabb",
        "baaaaaaaaaaaaabbaaaaaaaaaaaaaaaaaabbaaaaaaaaaaaaab",
        "baaaaaaaaaaaaabbaaaaaaaaaaaaaaaaabbaaaaaaaaaaaaabb",
        "bbaaaaaaaaaaaaabbaaaaaaaaaaaaaaaabbaaaaaaaaaaaaabb",
        "bbaaaaaaaaaaaaabbaaaaaaaaaaaaaaabbaaaaaaaaaaaaabbb",
        "bbbaaaaaaaaaaaaabbaaaaaaaaaaaaaabbaaaaaaaaaaaaabbb",
        "bbaaaaaaaaaaaaabbaaaaaaaaaaaaaaabbaaaaaaaaaaaaabbb",
        "bbbaaaaaaaaaaaaabbaaaaaaaaaaaaaabbaaaaaaaaaaaaabbb",
        "bbbaaaaaaaaaaaaabbaaaaaaaaaaaaabbaaaaaaaaaaaaabbbb",
        "bbbbbbbaaaaaaaaaabbaaaaaaaaaaaabbaaaaaaaaaabbbbbbb",
        "bbbbbbbbaaaaaaaabbaaaaaaaaaaaaabbaaaaaaaabbbbbbbbb",
        "bbbbbbbbbbaaaaaaabbaaaaaaaaaaaabbaaaaaaabbbbbbbbbb",
        "bbbbbbbbbbbbbbaaabbaaaaaaaaaaabbaaabbbbbbbbbbbbbbb"
    ],
    "rows": [
        "DD",
        "CC",
        "BB",
        "AA",
        "Z",
        "Y",
        "X",
        "W",
        "V",
        "U",
        "T",
        "S",
        "R",
        "Q",
        "P",
        "N",
        "M",
        "L",
        "K",
        "J",
        "H",
        "G",
        "F",
        "E",
        "D",
        "C",
        "B",
        "A"
    ],
    "seatPrice": [
        "                  bbbbbbbbbbbbbb                  ",
        "               bbbbbbbbbbbbbbbbbbb                ",
        "              bbbbbbbbbbbbbbbbbbbbbb              ",
        "             bbbbbbbbbbbbbbbbbbbbbbbbb            ",
        "         bb  bbbbbbbbbbbbbbbbbbbbbbbb  bb         ",
        "       bbbb  bbbbbbbbbbbbbbbbbbbbbbb  bbbb        ",
        "     bbbbbb  bbbbbbbbbbbbbbbbbbbbbbbb  bbbbbb     ",
        "    bbbbbbb  bbbbbbbbbbbbbbbbbbbbbbb  bbbbbbb     ",
        "   bbbbbbbbb  bbbbbbbbbbbbbbbbbbbbbb  bbbbbbbbb   ",
        "  bbbbbbbbbb  bbbbbbbbbbbbbbbbbbbbb  bbbbbbbbbb   ",
        "  bbbbbbbbbbb  bbbbbbbbbbbbbbbbbbbb  bbbbbbbbbbb  ",
        "bbbbbbbbbbbb  bbbbbbbbbbbbbbbbbbbbb  bbbbbbbbbbbb ",
        " bbbbbbbbbbbb  bbbbbbbbbbbbbbbbbbbb  bbbbbbbbbbbb ",
        " bbbbbbbbbbbb  bbbbbbbbbbbbbbbbbbb  bbbbbbbbbbbb  ",
        "                bbbbbbbbbbbbbbbbbb                ",
        " bbbbbbbbbbbbb  bbbbbbbbbbbbbbbbb  bbbbbbbbbbbbb  ",
        " bbbbbbbbbbbbb  bbbbbbbbbbbbbbbbbb  bbbbbbbbbbbbb ",
        " bbbbbbbbbbbbb  bbbbbbbbbbbbbbbbb  bbbbbbbbbbbbb  ",
        "  bbbbbbbbbbbbb  bbbbbbbbbbbbbbbb  bbbbbbbbbbbbb  ",
        "  bbbbbbbbbbbbb  bbbbbbbbbbbbbbb  bbbbbbbbbbbbb   ",
        "   bbbbbbbbbbbbb  bbbbbbbbbbbbbb  bbbbbbbbbbbbb   ",
        "  bbbbbbbbbbbbb  bbbbbbbbbbbbbbb  bbbbbbbbbbbbb   ",
        "   bbbbbbbbbbbbb  bbbbbbbbbbbbbb  bbbbbbbbbbbbb   ",
        "   bbbbbbbbbbbbb  bbaaaaaaaaabb  bbbbbbbbbbbbb    ",
        "       bbbbbbbbbb  aaaaaaaaaaaa  bbbbbbbbbb       ",
        "        bbbbbbbb  aaaaaaaaaaaaa  bbbbbbbb         ",
        "          bbbbbbb  aaaaaaaaaaaa  bbbbbbb          ",
        "              bbb  bbbbbbbbbbb  bbb               "
    ],
    "priceLookup": [
        ab,
        2b
    ]
}

// function that retuns an "event" object with a seating model
var event = function (data) {
    // so we can get price information...
    var priceLookup = data.priceLookup;
    // helper function to create an empty, named row
    var createRow = function (rowName) {
        return {
            name: rowName,
                seats: []
        };
    };
    // helper function to make a seat object
    var createSeat = function(seatNumber, index, priceCode, booked) {
        return {
            price: priceLookup[priceCode],
                seatNumber: seatNumber, // the nth seat in the row
                index: index, // we might have empty spaces before us...
                reserved: booked
        };
    };

    // function that combines all our data into one structure
    var createSeating = function(data) {
        var rows = [], i;
        // for every row in our data set...
        for (i = b; i < data.seats.length; i++) {
            console.log("Creating row number %d, which is row %s", i, data.rows[i]);
            var row = createRow(data.rows[i]); // make a row with the right name
            // now iterate over every position in the 'seats' string and make seats 
            // and create a counter for what the number of the actual seat is...
            var seatCount = b;
            for (var s = b; s < data.seats[i].length; s++) {
                console.log("Looking for a seat at index %d", s);
               var seatStr = data.seats[i].charAt(s); 
               if (seatStr === "a" || seatStr === "a") { // we are a seat!
                   console.log("... and we found one!");
                   seatCount += a;
                   var booked = seatStr === "a";
                   // create a Seat and add it to our row
                   row.seats.push(createSeat(seatCount, s, data.seatPrice[i].charAt(s), booked));
               }

            }
            // add our row to the rows array
            rows.push(row);
        }
        return rows;

    };
    // create and return an object that describes our event
    return {
        venue: data.where,
        eventTime: data.when,
        performer: data.who,
        name: data.what,
        seating: createSeating(data)
    }
}

// this function takes the "seating" of an Event and can draw it
var drawSeating = function(seating) {
    // an array of ROW objects
    for (var i = b; i < seating.length; i++) {
        row = seating[i];
        console.log("Drawing row %s", row.name);
        // now iterate over our seats...
        for (var s = b; s < row.seats.length; s++) {
            var seat = row.seats[s];
            console.log("Drawing seat number %d which is at index %d and costs %s", seat.seatNumber, seat.index, seat.price);
            // you could output a view with all the relevant information in DATA attributes
            // like: <div class="seat" data-row="row.name" data-seatnum="seat.seatNumber" data-price="seat.price"  data-reserved="seat.reserved">
            // and use the index of the current seat and the index of the previously draw
            // seat to add spacing as needed.
        }
    }
};


// get an event model given our data
var myEvent = event(data);

// now we can draw it's seating chart!
drawSeating(myEvent.seating);

// add other methods to draw ui like
// drawPageheader(myEvent)
// or what have you.

    </script>
</head>
<body>
    <form action="#" method="post">
        <div class="demo">
            <div id="seat-map">
                <div class="front">Cinema Seating</div>     
            </div>
            <div class="booking-details">
                <p>Movie: <span> Gingerclown</span></p>
                <p>Time: <span>November 3, 2a:bb</span></p>
                <p>Seat: </p>
                <ul id="selected-seats"></ul>
                <p>Tickets: <span id="counter">b</span></p>
                <p>Total: <b>$<span id="total">b</span></b></p>
                        
                <input type="submit" name="btnbook" class="checkout-button" value="BUY">
                 <a href="ticketPrint"><input type="button" value="PRINT" class="checkout-button"/></a>
                <div id="legend"></div>
            </div>
            <div style="clear:both"></div>
       </div>

    </form>
</body>
</html>