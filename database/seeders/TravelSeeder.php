<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Faq;
use App\Models\Review;
use App\Models\Trip;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TravelSeeder extends Seeder
{
    public function run(): void
    {
        // Clear old test data first
        Schema::disableForeignKeyConstraints();
        Booking::truncate();
        Review::truncate();
        Faq::truncate();
        \App\Models\TripDay::truncate();
        Trip::truncate();
        Schema::enableForeignKeyConstraints();

        // ---------- TRIPS + ITINERARY ----------
        $trips = [
            [
                'slug' => 'spiti-valley-road-trip',
                'title' => 'Spiti Valley Road Trip',
                'tagline' => 'Monasteries, moon lakes and the roof of the world',
                'price' => 24500, 'duration_days' => 8, 'max_group_size' => 12, 'seats_left' => 12,
                'description' => 'An 8-day journey from Shimla through Kinnaur into the cold desert of Spiti. Ancient monasteries, high passes, starry camps and the turquoise Chandratal lake.',
                'days' => [
                    ['Delhi to Shimla', 'Overnight ride to Shimla. Meet the group over breakfast.'],
                    ['Shimla to Kalpa', 'Drive along the Sutlej through Kinnaur apple orchards.'],
                    ['Kalpa to Nako', 'Views of Kinner Kailash, then the quiet lakeside village of Nako.'],
                    ['Nako to Kaza', 'Stop at Gue village and drive into the heart of Spiti.'],
                    ['Kaza sightseeing', 'Key Monastery, Kibber village, Chicham bridge and Langza fossils.'],
                    ['Kaza to Chandratal', 'Cross Kunzum Pass and camp beside the moon-shaped lake.'],
                    ['Chandratal to Manali', 'Scenic drive via Batal and the Rohtang side into Manali.'],
                    ['Manali to Delhi', 'Overnight ride back. Trip ends next morning.'],
                ],
            ],
            [
                'slug' => 'leh-ladakh-bike-expedition',
                'title' => 'Leh Ladakh Bike Expedition',
                'tagline' => 'Ride the high passes on two wheels',
                'price' => 38900, 'duration_days' => 9, 'max_group_size' => 10, 'seats_left' => 10,
                'description' => 'Nine days on Royal Enfields across Khardung La, Nubra Valley and Pangong Lake. Backup vehicle, mechanic and trip leader included.',
                'days' => [
                    ['Arrive in Leh', 'Rest day to adjust to the altitude. Collect your bike.'],
                    ['Leh sightseeing', 'Shanti Stupa, Leh Palace and the main market. Short test ride.'],
                    ['Leh to Nubra via Khardung La', 'Ride over one of the highest motorable passes into Nubra Valley.'],
                    ['Nubra Valley', 'Hunder sand dunes, camel ride and Diskit Monastery.'],
                    ['Nubra to Pangong Lake', 'Ride along the Shyok river to a lakeside camp.'],
                    ['Pangong to Leh via Chang La', 'Sunrise at the lake, then ride back over Chang La.'],
                    ['Leh to Lamayuru and back', 'Magnetic Hill, Sangam point and the moonland landscape.'],
                    ['Monasteries day', 'Thiksey and Hemis monasteries. Free evening in Leh.'],
                    ['Departure', 'Return bikes and head to the airport.'],
                ],
            ],
            [
                'slug' => 'kerala-backwaters-munnar',
                'title' => 'Kerala Backwaters & Munnar',
                'tagline' => 'Tea hills, spice trails and a night on a houseboat',
                'price' => 21500, 'duration_days' => 6, 'max_group_size' => 14, 'seats_left' => 14,
                'description' => 'A relaxed 6-day trip through Kochi, the Munnar tea hills, Periyar wildlife and the Alleppey backwaters, with a private houseboat night.',
                'days' => [
                    ['Arrive in Kochi', 'Fort Kochi walk, Chinese fishing nets and an evening Kathakali show.'],
                    ['Kochi to Munnar', 'Drive up through tea gardens with a stop at waterfalls.'],
                    ['Munnar', 'Eravikulam National Park, Mattupetty Dam and a tea museum visit.'],
                    ['Munnar to Thekkady', 'Spice plantation walk and a boat ride on Periyar Lake.'],
                    ['Thekkady to Alleppey', 'Board a private houseboat and spend the night on the backwaters.'],
                    ['Alleppey to Kochi', 'Breakfast on the boat, then drop-off at Kochi airport.'],
                ],
            ],
            [
                'slug' => 'royal-rajasthan-circuit',
                'title' => 'Royal Rajasthan Circuit',
                'tagline' => 'Forts, palaces and a night under desert stars',
                'price' => 27800, 'duration_days' => 7, 'max_group_size' => 16, 'seats_left' => 16,
                'description' => 'Seven days through Jaipur, Jodhpur and Jaisalmer. Grand forts, blue-city lanes, camel rides and an evening of folk music in the Thar desert.',
                'days' => [
                    ['Arrive in Jaipur', 'Hawa Mahal, local bazaars and a welcome dinner.'],
                    ['Jaipur sightseeing', 'Amber Fort, City Palace and Jantar Mantar.'],
                    ['Jaipur to Jodhpur via Pushkar', 'Pushkar lake and temple stop, then on to Jodhpur.'],
                    ['Jodhpur', 'Mehrangarh Fort and a walk through the blue city.'],
                    ['Jodhpur to Jaisalmer', 'Drive through the Thar and watch sunset at Sam dunes.'],
                    ['Jaisalmer', 'Golden fort, havelis, camel safari and folk music at camp.'],
                    ['Departure', 'Transfer to Jaisalmer airport or station.'],
                ],
            ],
            [
                'slug' => 'valley-of-flowers-trek',
                'title' => 'Valley of Flowers Trek',
                'tagline' => 'A Himalayan meadow in full bloom',
                'price' => 16900, 'duration_days' => 6, 'max_group_size' => 15, 'seats_left' => 15,
                'description' => 'A 6-day moderate trek to the UNESCO-listed Valley of Flowers and Hemkund Sahib. Best in July to September, when the meadows bloom.',
                'days' => [
                    ['Rishikesh to Joshimath', 'Scenic drive along the Alaknanda river via Devprayag.'],
                    ['Govindghat to Ghangaria', 'Trek about 12 km through pine forest to Ghangaria village.'],
                    ['Valley of Flowers', 'Full day among alpine blooms, streams and glacier views.'],
                    ['Hemkund Sahib', 'Steep climb to the gurudwara and the glacial lake.'],
                    ['Ghangaria to Joshimath', 'Easy downhill trek, then drive to Joshimath.'],
                    ['Joshimath to Rishikesh', 'Drive back. Trip ends in the evening.'],
                ],
            ],
        ];

        $tripIds = [];
        foreach ($trips as $t) {
            $days = $t['days'];
            unset($t['days']);
            $t['is_published'] = true;

            $trip = Trip::create($t);
            $tripIds[$trip->slug] = $trip->id;

            foreach ($days as $i => [$title, $desc]) {
                $trip->days()->create([
                    'day_number' => $i + 1,
                    'title' => $title,
                    'description' => $desc,
                ]);
            }
        }

        // ---------- FAQS ----------
        $faqs = [
            ['How do I book a trip?', 'Send us an enquiry from the trip page. Our team will contact you on WhatsApp to confirm dates and details.'],
            ['What is included in the price?', 'Stay, daily breakfast and dinner, ground transport, a trip leader and all permits listed in the itinerary. Flights and personal expenses are extra.'],
            ['What is the cancellation policy?', 'Cancel 30 days or more before departure for a refund minus a small processing fee. Closer to departure, refunds are partial.'],
            ['Do I need to be very fit?', 'Road trips need no special fitness. Treks like Valley of Flowers need basic stamina. Walk 3 to 4 km daily for a few weeks before.'],
            ['Can I travel solo?', 'Yes. Many guests join alone and become friends with the group. Single rooms are available at extra cost.'],
            ['What ID do I need to carry?', 'Carry a government photo ID such as Aadhaar, passport or driving licence. Some areas also need printed permits, which we arrange.'],
            ['What happens if the weather is bad?', 'Mountain weather can change plans. Your trip leader will adjust the route for safety, and we will always keep you informed.'],
        ];
        foreach ($faqs as $i => [$q, $a]) {
            Faq::create(['question' => $q, 'answer' => $a, 'is_published' => true, 'sort_order' => $i + 1]);
        }

        // ---------- REVIEWS ----------
        $reviews = [
            ['Aarav Mehta', 'Mumbai', 'Chandratal under the stars was unreal. The leader knew every road and every tea stall.', 5, 'spiti-valley-road-trip'],
            ['Riya Kapoor', 'Delhi', 'Well organised, great stays and no rush. Spiti felt like a different planet.', 5, 'spiti-valley-road-trip'],
            ['Karan Singh', 'Chandigarh', 'Riding over Khardung La was a dream. The backup vehicle saved us once.', 5, 'leh-ladakh-bike-expedition'],
            ['Neha Iyer', 'Bengaluru', 'The houseboat night was the best part. Calm, tasty food and lovely hosts.', 5, 'kerala-backwaters-munnar'],
            ['Vikram Rathore', 'Pune', 'Good value and smooth planning. Jaisalmer camp evening was a highlight.', 4, 'royal-rajasthan-circuit'],
            ['Sana Khan', 'Lucknow', 'The valley was full of flowers. The trek was tough but the guides kept everyone going.', 5, 'valley-of-flowers-trek'],
        ];
        foreach ($reviews as $i => [$name, $loc, $quote, $rating, $slug]) {
            Review::create([
                'name' => $name, 'location' => $loc, 'quote' => $quote,
                'rating' => $rating, 'trip_id' => $tripIds[$slug],
                'is_published' => true, 'sort_order' => $i + 1,
            ]);
        }

        // ---------- BOOKINGS ----------
        // [slug, name, phone, email, travellers, days_ahead, message, status, received_days_ago]
        $bookings = [
            ['spiti-valley-road-trip', 'Rohit Sharma', '9810012345', 'rohit.s@example.com', 4, 40, 'We are a group of friends. Can we get a private cab?', 'confirmed', 12],
            ['spiti-valley-road-trip', 'Ananya Bose', '9830098765', null, 2, 55, 'Is September a good time?', 'new', 1],
            ['spiti-valley-road-trip', 'Tarun Gupta', '9899911223', 'tarun.g@example.com', 3, 35, null, 'contacted', 4],
            ['leh-ladakh-bike-expedition', 'Harsh Vardhan', '9717700110', null, 2, 60, 'Do you provide riding gear?', 'confirmed', 9],
            ['leh-ladakh-bike-expedition', 'Imran Qureshi', '9811122334', 'imran.q@example.com', 1, 75, 'Solo rider, first time in Ladakh.', 'new', 0],
            ['kerala-backwaters-munnar', 'Divya Nair', '9847012345', 'divya.n@example.com', 2, 30, 'Honeymoon trip. Any special arrangement?', 'confirmed', 6],
            ['kerala-backwaters-munnar', 'Suresh Menon', '9446098123', null, 5, 45, 'Family with two kids.', 'contacted', 3],
            ['royal-rajasthan-circuit', 'Pooja Agarwal', '9929900456', 'pooja.a@example.com', 6, 50, 'Can we extend by 1 day in Udaipur?', 'new', 2],
            ['valley-of-flowers-trek', 'Mohit Joshi', '9958811776', null, 2, 25, 'Is the trek okay for beginners?', 'cancelled', 14],
            ['valley-of-flowers-trek', 'Shreya Das', '9830155667', 'shreya.d@example.com', 3, 28, 'Need pickup from Haridwar station.', 'confirmed', 8],
        ];
        foreach ($bookings as [$slug, $name, $phone, $email, $travellers, $ahead, $msg, $status, $ago]) {
            $b = Booking::create([
                'trip_id' => $tripIds[$slug],
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'travellers' => $travellers,
                'preferred_date' => now()->addDays($ahead)->toDateString(),
                'message' => $msg,
                'status' => $status,
                'internal_notes' => $status === 'contacted' ? 'Called once, waiting for reply.' : null,
            ]);

            // Make the "received" time look realistic
            $b->forceFill([
                'created_at' => now()->subDays($ago)->subHours(rand(1, 10)),
                'updated_at' => now()->subDays($ago),
            ])->saveQuietly();
        }
    }
}