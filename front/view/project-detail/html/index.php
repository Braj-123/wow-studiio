<?php
declare(strict_types=1);

/**
 * ============================================================================
 * WoW STUDIO — DEDICATED PROJECT STORY & CINEMATIC MASTERPIECE DETAIL VIEW
 * Full Production Journey:
 *   1. Full-Screen Cinematic Cover Hero (Video/Photo backdrop + Optics Badge)
 *   2. Behind-The-Lens Production Slate (Camera, Lenses, Color Profile, Audio)
 *   3. Chapter 1: The Brief & Creative Vision
 *   4. Chapter 2: Technical Recce & Palace Architecture Mapping
 *   5. Chapter 3: Chronological Day-by-Day Shoot Journey (Photo-by-Photo Story)
 *   6. Chapter 4: Kaise Photo Pick Hua — Curation Philosophy & Selection Science
 *   7. Chapter 5: Post-Production Darkroom (DaVinci Resolve & Kodak 2383 Color Grading)
 *   8. Chapter 6: Final Deliverables & Heirloom Presentation
 *   9. Curated High-Resolution Editorial Gallery & Lightbox Viewer
 *  10. Verified Client Review & Testimonial
 *  11. Adjacent Masterpiece Switcher (Previous / Next Project)
 *  12. Closing VIP Date Inquiry & Booking CTA (/rsvp)
 * Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
 * File: front/view/project-detail/html/index.php
 * ============================================================================
 */

$appBasePath = $appBasePath ?? '';

// Masterpiece Projects Repository with Full Story & Curation Data
$masterpieceRepo = [
    '01' => [
        'id'          => '01',
        'slug'        => 'the-regal-velvet-bride',
        'title'       => 'The Regal Velvet Bride',
        'tag'         => 'EDITORIAL BRIDAL',
        'category'    => 'Wedding & Editorial',
        'couple'      => 'Aditi & Ranveer',
        'location'    => 'Luxury Royal Suite, City Palace, Udaipur',
        'date'        => 'Winter Grandeur &bull; December 2026',
        'cover_image' => 'uploads/photo store/3.jpeg',
        'optics'      => '85MM F/1.4 GM // ARRI 35 LOOK',
        'camera'      => 'ARRI Alexa 35 &amp; Sony FX3 Cinema Line',
        'lenses'      => 'Sony FE 85mm f/1.4 GM II // FE 50mm f/1.2 GM',
        'color'       => 'Custom Kodak 2383 10-Bit 4:2:2 Film Profile',
        'aerial'      => 'DJI Inspire 3 ProRes 8K Palatial Flythrough',
        'raw_count'   => '16,840',
        'curated_count' => '2,420',
        'album_spreads' => '120',
        'desc'        => 'Handcrafted zardozi in rich royal burgundy velvet, captured under dramatic chiaroscuro palace illumination. Aditi’s bridal session took place inside the private gilded apartments of Udaipur’s royal palace. Every fold of her heirloom lehenga, every glance towards the marble arches, and the subtle glimmer of antique polki jewellery were documented with master cinema lenses.',
        'narrative_1' => 'The morning began before dawn with soft incandescent lighting washing over ancient marble frescoes. Rather than posed stiffness, our creative director focused on authentic private moments—the bride admiring the heirloom necklace passed down through four generations, her grandmother gently tying the sacred chooda, and the profound silence before the first drumbeats of the baraat.',
        'narrative_2' => 'Shot on full-frame cinema glass with anamorphic depth of field, each frame feels like an oil painting from a royal dynasty. The rich velvet textures of the royal burgundy lehenga absorb and reflect palace chandeliers, creating a look that transcends standard wedding albums into museum-grade art.',
        'quote'       => 'WoW Studio didn’t just take wedding photos; they created high-fashion art. Seeing my bridal portrait looking like a period royal film blew away our families! Truly master storytelling.',
        'timeline'    => [
            [
                'step'      => '01',
                'time'      => '06:00 AM • PRE-DAWN',
                'title'     => 'The Private Bridal Suite & Sacred Heirloom',
                'image'     => 'uploads/photo store/3.jpeg',
                'gear'      => 'Sony FE 85mm f/1.4 GM II @ f/1.6 • 1/200s ISO 400',
                'desc'      => 'Before the royal palace awakened, soft 3200K tungsten lamps illuminated the intricate zardozi embroidery of Aditi’s burgundy velvet lehenga. Our lead director focused on intimate, quiet candids—the bride holding her grandmother’s hand and the gentle silence before the celebrations.',
                'curation'  => 'Why Picked: Selected out of 340 burst frames for the authentic serenity in the bride’s eyes and the needlepoint micro-contrast on the antique gold threadwork.'
            ],
            [
                'step'      => '02',
                'time'      => '11:30 AM • MIDDAY SUN',
                'title'     => 'Groom’s Regal Preparation & Ancestral Safa',
                'image'     => 'uploads/photo store/6.jpeg',
                'gear'      => 'Sony FE 50mm f/1.2 GM @ f/1.4 • 1/800s ISO 100',
                'desc'      => 'Ranveer’s preparation inside the palace armor gallery. We balanced the harsh Rajasthani sun using 12x12 silk diffusers, letting natural side-lighting sculpt the groom fastening his ancestral jeweled sword.',
                'curation'  => 'Why Picked: Chosen for perfect architectural symmetry with the hand-carved stone arch and the intense, calm regal poise of the groom.'
            ],
            [
                'step'      => '03',
                'time'      => '05:15 PM • GOLDEN HOUR',
                'title'     => 'Sunset Whispers by the Marble Jharokhas',
                'image'     => 'uploads/photo store/2.jpeg',
                'gear'      => 'Sony FE 35mm f/1.4 GM @ f/1.8 • 1/500s ISO 200',
                'desc'      => 'A private 15-minute window right as the sun touched the Aravalli hills. We led the couple away from the gathering into an undisturbed palace courtyard for unscripted, natural dialogue.',
                'curation'  => 'Why Picked: Backlit golden rim illumination wrapping around both profiles without artificial strobes, preserving pure romance.'
            ],
            [
                'step'      => '04',
                'time'      => '07:45 PM • SACRED TWILIGHT',
                'title'     => 'The Sacred Pheras & Rose Petal Shower',
                'image'     => 'uploads/photo store/4.jpeg',
                'gear'      => 'Sony FE 24-70mm f/2.8 GM II @ f/2.8 • 1/250s ISO 1600',
                'desc'      => 'Surrounded by Vedic mantras and sacred agni smoke, thousands of fresh Kashmiri rose petals were showered onto the couple. Our high-speed cameras captured the falling petals suspended mid-air.',
                'curation'  => 'Why Picked: The decisive moment where both bride and groom look upwards simultaneously with spontaneous joy; zero poses.'
            ],
            [
                'step'      => '05',
                'time'      => '10:30 PM • ROYAL NIGHT',
                'title'     => 'Imperial Banquet & Fireworks Spectacle',
                'image'     => 'uploads/photo store/11.jpeg',
                'gear'      => 'Sony FE 24mm f/1.4 GM @ f/1.4 • 1/125s ISO 2500',
                'desc'      => 'The grand entrance under illuminated Mehrangarh-style ramparts with champagne fountains and live classical symphony. The high-sensitivity cinema sensors captured the fireworks without blowing out highlights.',
                'curation'  => 'Why Picked: Dynamic range preserving the deep royal burgundy velvet while rendering the fireworks trail in crisp pinpoint sharpness.'
            ]
        ],
        'gallery'     => [
            'uploads/photo store/3.jpeg',
            'uploads/photo store/6.jpeg',
            'uploads/photo store/2.jpeg',
            'uploads/photo store/4.jpeg',
            'uploads/photo store/11.jpeg',
            'uploads/photo store/12.jpeg',
        ]
    ],
    '02' => [
        'id'          => '02',
        'slug'        => 'destiny-by-the-river',
        'title'       => 'Destiny By The River',
        'tag'         => 'PRE-WEDDING CINEMA',
        'category'    => 'Pre-Wedding & Films',
        'couple'      => 'Pooja & Aniket',
        'location'    => 'Iconic Hooghly Riverfront, Kolkata',
        'date'        => 'Autumn Equinox &bull; October 2026',
        'cover_image' => 'uploads/photo store/10.jpeg',
        'optics'      => '35MM F/1.4 GM // 4K 10-BIT LOG',
        'camera'      => 'Sony FX6 Cinema Camera &bull; Sony FX3 B-Cam',
        'lenses'      => 'Sony FE 35mm f/1.4 GM // FE 24-70mm f/2.8 GM II',
        'color'       => 'Dawn Pastel S-Log3 with Teal &amp; Champagne Grading',
        'aerial'      => 'DJI Mavic 3 Cine ProRes 422HQ',
        'raw_count'   => '12,400',
        'curated_count' => '1,890',
        'album_spreads' => '90',
        'desc'        => 'Two souls united beneath the monumental suspension bridge at dawn as morning mist sweeps across the waters. We chose the quiet pre-dawn hours where the Ganga breeze carries the ringing of distant temple bells, crafting an unforgettable cinematic opening sequence.',
        'narrative_1' => 'Pooja and Aniket wanted their pre-wedding story to embody their deep romantic connection to the iconic city where they first fell in love as university students. We choreographed the shoot to synchronize with the golden morning sun emerging through mist.',
        'narrative_2' => 'The contrast between the monumental industrial steel of the cantilever bridge and the gentle intimacy of the couple’s embrace produced a timeless visual signature that became the foundation for their 4K wedding teaser film.',
        'quote'       => 'Our pre-wedding film felt like a cinema teaser on the big screen! WoW Studio’s team woke up at 4 AM with us and directed every scene effortlessly. We felt like movie stars.',
        'timeline'    => [
            [
                'step'      => '01',
                'time'      => '04:30 AM • PRE-DAWN',
                'title'     => 'Ghats Awakening & Mist Over Waters',
                'image'     => 'uploads/photo store/10.jpeg',
                'gear'      => 'Sony FE 35mm f/1.4 GM @ f/1.6 • 1/160s ISO 800',
                'desc'      => 'Riverfront boats bobbing on quiet river ripples as morning fog wrapped around the historic bridge pillars.',
                'curation'  => 'Why Picked: Ethereal atmospheric haze and genuine laughter as the couple stepped onto the wooden boat.'
            ],
            [
                'step'      => '02',
                'time'      => '06:45 AM • SUNRISE',
                'title'     => 'Golden Rays Across Cantilever Arches',
                'image'     => 'uploads/photo store/4.jpeg',
                'gear'      => 'Sony FE 24-70mm f/2.8 GM II @ f/2.8 • 1/640s ISO 160',
                'desc'      => 'Capturing the golden light bouncing off the river waves, wrapping the couple in natural pastel amber warmth.',
                'curation'  => 'Why Picked: The dramatic scale of architectural grandeur contrasting with intimate hand-holding.'
            ],
            [
                'step'      => '03',
                'time'      => '09:00 AM • MORNING TEA',
                'title'     => 'Vintage Tram Ride & Clay Chai Cups',
                'image'     => 'uploads/photo store/14.jpeg',
                'gear'      => 'Sony FE 50mm f/1.2 GM @ f/1.4 • 1/1000s ISO 100',
                'desc'      => 'An unscripted stroll through heritage streets, sharing hot kulhad chai amidst the clanging bells of vintage wooden trams.',
                'curation'  => 'Why Picked: Unfiltered spontaneous joy and authentic cultural connection.'
            ]
        ],
        'gallery'     => [
            'uploads/photo store/10.jpeg',
            'uploads/photo store/4.jpeg',
            'uploads/photo store/5.jpeg',
            'uploads/photo store/14.jpeg',
            'uploads/photo store/2.jpeg',
            'uploads/photo store/18.jpeg',
        ]
    ],
    '03' => [
        'id'          => '03',
        'slug'        => 'the-royal-heritage-couple',
        'title'       => 'The Royal Heritage Couple',
        'tag'         => 'FINE-ART PORTRAIT',
        'category'    => 'Royal Wedding Fine-Art',
        'couple'      => 'Meera & Siddharth',
        'location'    => 'Heritage Courtyard, Jaipur',
        'date'        => 'Spring Equinox &bull; November 2026',
        'cover_image' => 'uploads/photo store/2.jpeg',
        'optics'      => '50MM F/1.2 GM // 1/250S ISO 100',
        'camera'      => 'Hasselblad X2D 100C &bull; Sony A1',
        'lenses'      => 'Sony FE 50mm f/1.2 GM // FE 135mm f/1.8 GM',
        'color'       => 'Medium Format 16-Bit Color Depth // Royal Heritage LUT',
        'aerial'      => 'Ronin 4D 4-Axis Handheld Gimbal Cinematic Steadicam',
        'raw_count'   => '14,200',
        'curated_count' => '2,150',
        'album_spreads' => '110',
        'desc'        => 'Authentic timeless dignity preserved forever — where natural palace morning light meets unscripted emotional intimacy. Meera and Siddharth’s portraiture highlights symmetry, architectural scale, and subtle smiles that speak of a lifetime commitment.',
        'narrative_1' => 'Surrounded by hand-carved pink sandstone jaalis and centuries-old royal courtyards, our focus was to maintain classic poise while extracting raw, unscripted eye contact that only genuine love produces.',
        'narrative_2' => 'Using prime lenses wide open at f/1.2, the architectural background dissolved into smooth, creamy bokeh, leaving the couple’s expressions sharp and luminous.',
        'quote'       => 'The medium format prints arrived in a handcrafted velvet case. They are family heirlooms we will cherish for generations. WoW Studio is unmatched.',
        'timeline'    => [
            [
                'step'      => '01',
                'time'      => '07:30 AM • COURTYARD',
                'title'     => 'Pink Sandstone Jaali Symmetry',
                'image'     => 'uploads/photo store/2.jpeg',
                'gear'      => 'Sony FE 50mm f/1.2 GM @ f/1.4 • 1/500s ISO 100',
                'desc'      => 'Geometric architectural corridors where morning palace light filters through marble lattice screens.',
                'curation'  => 'Why Picked: Flawless central framing and natural regal posture.'
            ],
            [
                'step'      => '02',
                'time'      => '01:00 PM • ROYAL PAVILION',
                'title'     => 'Intricate Polki & Gold Thread Details',
                'image'     => 'uploads/photo store/7.jpeg',
                'gear'      => 'Sony FE 90mm f/2.8 Macro @ f/4 • 1/250s ISO 200',
                'desc'      => 'Extreme macro study of heritage bridal jewelry and heirloom royal safa brooches.',
                'curation'  => 'Why Picked: Museum-grade texture capture with tactile clarity.'
            ]
        ],
        'gallery'     => [
            'uploads/photo store/2.jpeg',
            'uploads/photo store/7.jpeg',
            'uploads/photo store/13.jpeg',
            'uploads/photo store/17.jpeg',
            'uploads/photo store/3.jpeg',
            'uploads/photo store/11.jpeg',
        ]
    ],
    '04' => [
        'id'          => '04',
        'slug'        => 'haldi-golden-radiance',
        'title'       => 'Haldi Golden Radiance',
        'tag'         => 'RITUALS & CANDID JOY',
        'category'    => 'Sacred Rituals & Haldi',
        'couple'      => 'Rhea & Kabir',
        'location'    => 'Palace Gardens, Rajasthan',
        'date'        => 'Winter Festive &bull; December 2026',
        'cover_image' => 'uploads/photo store/8.jpeg',
        'optics'      => '24-70MM F/2.8 GM // 120 FPS HIGH-SPEED',
        'camera'      => 'Sony FX3 Cinema Line // High-Speed 120fps',
        'lenses'      => 'Sony FE 24-70mm f/2.8 GM II // FE 16-35mm f/2.8 GM',
        'color'       => 'Golden Amber Vivid Color Profile &bull; 10-Bit HDR',
        'aerial'      => 'FPV Low-Altitude Marigold Shower Flyover',
        'raw_count'   => '18,500',
        'curated_count' => '2,800',
        'album_spreads' => '100',
        'desc'        => 'Vibrant marigold petals, unfiltered laughter, and sacred turmeric blessings documented in fluid slow-motion. A joyous explosion of saffron, water splashes, and unfiltered family happiness.',
        'narrative_1' => 'The Haldi ceremony was a pure celebration of spontaneity. We deployed multiple cinema cameras at 120 frames per second to freeze droplets of scented turmeric water and thousands of yellow marigold petals mid-air.',
        'narrative_2' => 'Every family member’s genuine laughter was documented without a single stage-directed pose. This authentic joy forms the energetic heart of their wedding film teaser.',
        'quote'       => 'Our Haldi photos are bursting with energy, laughter, and gorgeous golden colors! The slow-motion clips made everyone tear up with joy.',
        'timeline'    => [
            [
                'step'      => '01',
                'time'      => '10:00 AM • GARDEN LAWN',
                'title'     => 'Marigold Petal Shower Explosion',
                'image'     => 'uploads/photo store/8.jpeg',
                'gear'      => 'Sony FE 24-70mm f/2.8 GM II @ f/2.8 • 1/2000s ISO 400',
                'desc'      => 'Freeze-framing water splashes and marigold petals surrounding the couple in pure euphoria.',
                'curation'  => 'Why Picked: Spontaneous expression of laughing tears.'
            ]
        ],
        'gallery'     => [
            'uploads/photo store/8.jpeg',
            'uploads/photo store/9.jpeg',
            'uploads/photo store/13.jpeg',
            'uploads/photo store/14.jpeg',
            'uploads/photo store/17.jpeg',
            'uploads/photo store/2.jpeg',
        ]
    ],
    '05' => [
        'id'          => '05',
        'slug'        => 'sangeet-midnight-rhythm',
        'title'       => 'Sangeet Midnight Rhythm',
        'tag'         => 'CELEBRATION & BEATS',
        'category'    => 'Sangeet & Concert Nights',
        'couple'      => 'Natasha & Dev',
        'location'    => 'Grand Ballroom Gala, Goa',
        'date'        => 'New Year Eve &bull; January 2027',
        'cover_image' => 'uploads/photo store/9.jpeg',
        'optics'      => '24MM F/1.4 GM // ISO 1600 RAW',
        'camera'      => 'Sony A7S III Low-Light Cinema // FX3 Rig',
        'lenses'      => 'Sony FE 24mm f/1.4 GM // FE 50mm f/1.2 GM',
        'color'       => 'Anamorphic Blue Flaring &bull; Concert S-Cinetone Profile',
        'aerial'      => 'Stage Crane &bull; 360-Degree Choreography Tracking',
        'raw_count'   => '15,600',
        'curated_count' => '2,300',
        'album_spreads' => '95',
        'desc'        => 'Electrifying stage choreography, anamorphic lens flares, and ecstatic family celebration under festival skies. Natasha & Dev’s Sangeet was produced like an international music concert.',
        'narrative_1' => 'High-octane performances by both families culminated in a dramatic couple dance surrounded by stage pyrotechnics and cold sparks. Our dual cinema operators captured 360-degree orbital movements.',
        'narrative_2' => 'Low-light sensors preserved every strobe flash and saturated neon tone without grain, turning the night into an unforgettable musical cinema journey.',
        'quote'       => 'The Sangeet video edits looked like a Bollywood awards show! The energy, the audio clarity, and the angles were pure perfection.',
        'timeline'    => [
            [
                'step'      => '01',
                'time'      => '09:30 PM • MAIN STAGE',
                'title'     => 'Couple Choreography & Pyro Sparks',
                'image'     => 'uploads/photo store/9.jpeg',
                'gear'      => 'Sony FE 24mm f/1.4 GM @ f/1.4 • 1/320s ISO 1600',
                'desc'      => 'Cold pyrotechnic sparks shooting upwards as the couple performed their signature waltz.',
                'curation'  => 'Why Picked: Perfect capture of mid-spin motion and glittering golden sparks.'
            ]
        ],
        'gallery'     => [
            'uploads/photo store/9.jpeg',
            'uploads/photo store/15.jpeg',
            'uploads/photo store/8.jpeg',
            'uploads/photo store/10.jpeg',
            'uploads/photo store/16.jpeg',
            'uploads/photo store/18.jpeg',
        ]
    ],
    '06' => [
        'id'          => '06',
        'slug'        => 'imperial-grand-banquet',
        'title'       => 'Imperial Grand Banquet',
        'tag'         => 'DESTINATION RECEPTION',
        'category'    => 'Grand Reception Gala',
        'couple'      => 'Simran & Vikram',
        'location'    => 'Fortress Amphitheatre, Jodhpur',
        'date'        => 'Royal Winter &bull; February 2027',
        'cover_image' => 'uploads/photo store/15.jpeg',
        'optics'      => '16-35MM F/2.8 GM // FULL-FRAME HDR',
        'camera'      => 'Sony FX6 &bull; FX3 Cinema Pair',
        'lenses'      => 'Sony FE 16-35mm f/2.8 GM II // FE 70-200mm f/2.8 GM II',
        'color'       => 'Royal Burgundy &amp; Gold Contrast Grading',
        'aerial'      => 'High-Altitude Fortress Night Drone Panorama',
        'raw_count'   => '17,100',
        'curated_count' => '2,550',
        'album_spreads' => '125',
        'desc'        => 'Bespoke crystal chandeliers, majestic floral architecture, and an unforgettable lifetime milestone. An imperial grand banquet held beneath the illuminated ramparts of Mehrangarh.',
        'narrative_1' => 'Over 800 international guests attended this monumental banquet. Our crew deployed 6 specialized camera operators, balancing sweeping grand architectural establishing shots with deeply intimate couple portraits.',
        'narrative_2' => 'The candlelit tables and thousands of hand-strung orchids provided a dreamlike foreground for high-fashion editorial coverage.',
        'quote'       => 'Managing a huge banquet of 800 guests seemed daunting, but WoW Studio captured every dignitary and every private smile with poise.',
        'timeline'    => [
            [
                'step'      => '01',
                'time'      => '08:00 PM • AMPHITHEATRE',
                'title'     => 'Candlelit Chandelier Banquet Panorama',
                'image'     => 'uploads/photo store/15.jpeg',
                'gear'      => 'Sony FE 16-35mm f/2.8 GM II @ f/2.8 • 1/125s ISO 2000',
                'desc'      => 'Spectacular night establishing shot of the fort ramparts illuminated by golden ambient uplighting.',
                'curation'  => 'Why Picked: Complete dynastic scale combined with crystal chandelier detail.'
            ]
        ],
        'gallery'     => [
            'uploads/photo store/15.jpeg',
            'uploads/photo store/9.jpeg',
            'uploads/photo store/2.jpeg',
            'uploads/photo store/18.jpeg',
            'uploads/photo store/3.jpeg',
            'uploads/photo store/7.jpeg',
        ]
    ],
    '07' => [
        'id'          => '07',
        'slug'        => 'golden-hour-whispers',
        'title'       => 'Golden Hour Whispers',
        'tag'         => 'SUNSET ROMANCE',
        'category'    => 'Destination Pre-Wedding',
        'couple'      => 'Drishi & Karan',
        'location'    => 'Pichola Lakeside, Udaipur',
        'date'        => 'Twilight Edition &bull; March 2027',
        'cover_image' => 'uploads/photo store/4.jpeg',
        'optics'      => '85MM F/1.4 GM // BACKLIT FLARE',
        'camera'      => 'Sony FX3 Cinema Rig // Anamorphic 1.33x',
        'lenses'      => 'Sony FE 85mm f/1.4 GM II // FE 35mm f/1.4 GM',
        'color'       => 'Warm Amber Lake Flare // Cine Kodak LUT',
        'aerial'      => 'Low-Altitude Lake Boat Tracking Drone',
        'raw_count'   => '11,800',
        'curated_count' => '1,720',
        'album_spreads' => '85',
        'desc'        => 'Silhouetted against molten sunset reflections on Lake Pichola as the evening breeze cools the royal city. A quiet, poetry-inspired romance documented on master prime glass.',
        'narrative_1' => 'Drishi and Karan preferred serene silence over bustling locations. We charted a private wooden shikara at twilight, letting the boat drift into sunset reflections.',
        'narrative_2' => 'With the lens pointed into the setting sun, natural circular aperture flares bathed the couple in a halo of champagne warmth.',
        'quote'       => 'The lakeside sunset portraits are hanging framed in our living room. Everyone who visits stops and stares in amazement. Pure magic!',
        'timeline'    => [
            [
                'step'      => '01',
                'time'      => '05:45 PM • LAKE PICHOLA',
                'title'     => 'Molten Gold Water Reflections',
                'image'     => 'uploads/photo store/4.jpeg',
                'gear'      => 'Sony FE 85mm f/1.4 GM II @ f/1.4 • 1/1200s ISO 100',
                'desc'      => 'Soft silhouette framing as the sun dipped behind the ancient island palaces.',
                'curation'  => 'Why Picked: Pure natural lens flare without digital bloom.'
            ]
        ],
        'gallery'     => [
            'uploads/photo store/4.jpeg',
            'uploads/photo store/2.jpeg',
            'uploads/photo store/10.jpeg',
            'uploads/photo store/16.jpeg',
            'uploads/photo store/14.jpeg',
            'uploads/photo store/3.jpeg',
        ]
    ],
    '08' => [
        'id'          => '08',
        'slug'        => 'regal-hawa-mahal-portraiture',
        'title'       => 'Regal Hawa Mahal Portraiture',
        'tag'         => 'HERITAGE STREET EDITORIAL',
        'category'    => 'Architectural & Heritage',
        'couple'      => 'Ananya & Rishabh',
        'location'    => 'Hawa Mahal Environs, Jaipur',
        'date'        => 'Dawn Radiance &bull; April 2027',
        'cover_image' => 'uploads/photo store/5.jpeg',
        'optics'      => '70-200MM F/2.8 GM // TELEPHOTO COMPRESSION',
        'camera'      => 'Sony A1 Flagship 50MP // Sony FX6 Cinema',
        'lenses'      => 'Sony FE 70-200mm f/2.8 GM II // FE 24mm f/1.4 GM',
        'color'       => 'Pink City Pastel Warmth // Editorial Film Simulation',
        'aerial'      => 'DJI Inspire 3 ProRes Aerial Heritage Framing',
        'raw_count'   => '13,500',
        'curated_count' => '1,980',
        'album_spreads' => '90',
        'desc'        => '953 windows of the Palace of Winds framing an immortal editorial love story in the Pink City of Jaipur. High-fashion couture meets timeless Rajput architecture.',
        'narrative_1' => 'To capture the iconic facade without modern street interference, our crew mobilized at 5:15 AM before the city awoke. Using extreme telephoto compression, the 953 stone windows stacked majestically directly behind the couple.',
        'narrative_2' => 'The morning breeze gently billowed the bride’s silk veil, creating an iconic fashion cover visual that looks lifted straight from an international couture publication.',
        'quote'       => 'Getting up at dawn was so worth it! The photos with the Palace of Winds look like a high-fashion magazine cover. WoW Studio exceeded all expectations.',
        'timeline'    => [
            [
                'step'      => '01',
                'time'      => '05:30 AM • DAWN ROOFTOP',
                'title'     => '953 Windows of Heritage Splendor',
                'image'     => 'uploads/photo store/5.jpeg',
                'gear'      => 'Sony FE 70-200mm f/2.8 GM II @ 135mm f/2.8 • 1/400s ISO 200',
                'desc'      => 'Extreme telephoto compression bringing the terracotta facade into breathtaking proximity.',
                'curation'  => 'Why Picked: Wind-billowed silk veil framing the couple against ancient stone jharokhas.'
            ]
        ],
        'gallery'     => [
            'uploads/photo store/5.jpeg',
            'uploads/photo store/16.jpeg',
            'uploads/photo store/18.jpeg',
            'uploads/photo store/10.jpeg',
            'uploads/photo store/2.jpeg',
            'uploads/photo store/14.jpeg',
        ]
    ]
];

// Determine Active Project ID (Default: '01')
$reqId = trim((string)($_GET['id'] ?? '01'));
if (!isset($masterpieceRepo[$reqId])) {
    $reqId = '01';
}
$project = $masterpieceRepo[$reqId];

// Calculate Previous and Next Project IDs for Seamless Navigation
$allIds = array_keys($masterpieceRepo);
$currentIdx = array_search($reqId, $allIds, true);
$prevIdx = ($currentIdx - 1 + count($allIds)) % count($allIds);
$nextIdx = ($currentIdx + 1) % count($allIds);

$prevProject = $masterpieceRepo[$allIds[$prevIdx]];
$nextProject = $masterpieceRepo[$allIds[$nextIdx]];
?>

<style>
/* -------------------------------------------------------------------------
   1. Luxury Editorial Project Story Stylesheet
   Theme: Royal Burgundy (#6b1426) & Champagne Gold (#cfa859)
   ------------------------------------------------------------------------- */
:root {
    --royal-burgundy: #6b1426;
    --burgundy-deep: #3f0914;
    --burgundy-midnight: #180206;
    --champagne-gold: #cfa859;
    --gold-light: #ffd875;
    --sand-cream: #faf6f0;
}

.project-detail-hero {
    position: relative;
    min-height: 85vh;
    display: flex;
    align-items: flex-end;
    padding-bottom: 75px;
    background: #0d0104;
    overflow: hidden;
    color: #ffffff;
    border-bottom: 2px solid var(--champagne-gold, #cfa859);
}

.project-hero-media-wrap {
    position: absolute;
    inset: 0;
    z-index: 1;
}

.project-hero-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center 30%;
    filter: brightness(0.68) contrast(1.08);
}

.project-hero-vignette {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at center, rgba(10, 1, 3, 0.2) 0%, rgba(10, 1, 3, 0.75) 65%, rgba(10, 1, 3, 0.98) 100%),
                linear-gradient(180deg, rgba(10, 1, 3, 0.4) 0%, transparent 40%, rgba(10, 1, 3, 0.95) 90%, #0d0104 100%);
    pointer-events: none;
}

.project-back-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 18px;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.12);
    border: 1px solid rgba(207, 168, 89, 0.5);
    color: #ffffff !important;
    text-decoration: none !important;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    backdrop-filter: blur(10px);
    transition: all 0.25s ease;
    margin-bottom: 22px;
}
.project-back-pill:hover {
    background: var(--royal-burgundy, #6b1426);
    border-color: var(--champagne-gold, #cfa859);
    transform: translateX(-4px);
    color: #ffd875 !important;
}

.project-category-badge {
    display: inline-block;
    padding: 5px 14px;
    border-radius: 20px;
    background: var(--royal-burgundy, #6b1426);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: #ffd875;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.project-hero-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(34px, 4.4vw, 62px);
    font-weight: 800;
    line-height: 1.15;
    color: #ffffff;
    text-shadow: 0 4px 20px rgba(0, 0, 0, 0.9);
    margin-bottom: 18px;
}

.project-meta-strip {
    display: flex;
    flex-wrap: wrap;
    gap: 24px;
    align-items: center;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.9);
    padding-top: 14px;
    border-top: 1px solid rgba(207, 168, 89, 0.35);
}

.project-meta-item {
    display: inline-flex;
    align-items: center;
    gap: 8px;
}
.project-meta-item i {
    color: var(--champagne-gold, #cfa859);
    font-size: 15px;
}

/* -------------------------------------------------------------------------
   2. Behind-The-Lens Production Slate
   ------------------------------------------------------------------------- */
.project-slate-section {
    background: #140207;
    padding: 38px 0;
    border-bottom: 1px solid rgba(207, 168, 89, 0.25);
    color: #ffffff;
}

.slate-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
}

.slate-box {
    background: rgba(30, 4, 10, 0.65);
    border: 1px solid rgba(207, 168, 89, 0.3);
    border-radius: 14px;
    padding: 16px 20px;
    transition: all 0.25s ease;
}
.slate-box:hover {
    border-color: var(--champagne-gold, #cfa859);
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(107, 20, 38, 0.35);
}

.slate-label {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    color: var(--champagne-gold, #cfa859);
    margin-bottom: 6px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.slate-val {
    font-family: 'Courier New', monospace;
    font-size: 13.5px;
    font-weight: 700;
    color: #ffffff;
    line-height: 1.4;
}

/* -------------------------------------------------------------------------
   3. Production Stats Counter Bar ("15,000+ RAW to Master Spreads")
   ------------------------------------------------------------------------- */
.production-stats-bar {
    background: linear-gradient(135deg, #1c0309 0%, #2e0610 100%);
    border-bottom: 1px solid rgba(207, 168, 89, 0.35);
    padding: 32px 0;
    color: #ffffff;
}
.stats-counter-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    text-align: center;
}
.stat-number {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(26px, 2.5vw, 36px);
    font-weight: 800;
    color: #ffd875;
    margin-bottom: 4px;
}
.stat-desc {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255, 255, 255, 0.75);
}

/* -------------------------------------------------------------------------
   4. Documentary Editorial Story Chapters
   ------------------------------------------------------------------------- */
.project-doc-section {
    padding: 85px 0 95px;
    background: #faf6f0;
    color: #2c2523;
}

.chapter-number-pill {
    display: inline-block;
    padding: 5px 14px;
    border-radius: 20px;
    background: rgba(107, 20, 38, 0.1);
    border: 1px solid rgba(207, 168, 89, 0.45);
    color: var(--royal-burgundy, #6b1426);
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.doc-chapter-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(28px, 2.8vw, 42px);
    font-weight: 800;
    color: var(--royal-burgundy, #6b1426);
    line-height: 1.22;
    margin-bottom: 20px;
}

.doc-chapter-lead {
    font-size: 17px;
    line-height: 1.8;
    color: #423835;
    margin-bottom: 18px;
}

.doc-chapter-p {
    font-size: 15px;
    line-height: 1.8;
    color: #5c4f4b;
    margin-bottom: 20px;
}

/* Timeline Cards */
.timeline-card-item {
    background: #ffffff;
    border-radius: 18px;
    border: 1.5px solid rgba(207, 168, 89, 0.4);
    box-shadow: 0 14px 36px rgba(107, 20, 38, 0.08);
    overflow: hidden;
    margin-bottom: 34px;
    transition: all 0.3s ease;
}
.timeline-card-item:hover {
    box-shadow: 0 20px 48px rgba(107, 20, 38, 0.16);
    border-color: var(--royal-burgundy, #6b1426);
}

.timeline-img-wrap {
    height: 380px;
    position: relative;
    overflow: hidden;
    background: #0d0104;
}
.timeline-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}
.timeline-card-item:hover .timeline-img-wrap img {
    transform: scale(1.04);
}

.timeline-time-badge {
    position: absolute;
    top: 18px;
    left: 18px;
    background: rgba(14, 2, 5, 0.88);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: #ffd875;
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1px;
    padding: 6px 14px;
    border-radius: 20px;
    backdrop-filter: blur(8px);
}

.timeline-body {
    padding: 26px 28px;
}

.timeline-gear-meta {
    font-family: 'Courier New', monospace;
    font-size: 11px;
    font-weight: 700;
    color: var(--royal-burgundy, #6b1426);
    letter-spacing: 0.8px;
    margin-bottom: 10px;
    text-transform: uppercase;
}

.timeline-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 22px;
    font-weight: 700;
    color: var(--royal-burgundy, #6b1426);
    margin-bottom: 12px;
}

.timeline-desc {
    font-size: 14.5px;
    line-height: 1.7;
    color: #4a403d;
    margin-bottom: 16px;
}

.curation-logic-box {
    background: #fdfbf7;
    border-left: 3.5px solid var(--champagne-gold, #cfa859);
    padding: 14px 18px;
    border-radius: 0 10px 10px 0;
    font-size: 13.5px;
    line-height: 1.6;
    color: #534541;
}
.curation-logic-box strong {
    color: var(--royal-burgundy, #6b1426);
}

/* -------------------------------------------------------------------------
   5. Curation Philosophy Breakdown ("Kaise Photo Pick Hua")
   ------------------------------------------------------------------------- */
.curation-science-section {
    padding: 85px 0 95px;
    background: #140207;
    color: #ffffff;
    border-top: 2px solid var(--champagne-gold, #cfa859);
    border-bottom: 1px solid rgba(207, 168, 89, 0.3);
}

.culling-pass-box {
    background: rgba(35, 5, 13, 0.7);
    border: 1px solid rgba(207, 168, 89, 0.3);
    border-radius: 16px;
    padding: 26px;
    height: 100%;
    transition: all 0.3s ease;
}
.culling-pass-box:hover {
    border-color: var(--champagne-gold, #cfa859);
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(107, 20, 38, 0.4);
}

.culling-pass-number {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 12px;
    font-weight: 800;
    color: var(--champagne-gold, #cfa859);
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.culling-pass-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 20px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 12px;
}

.culling-pass-desc {
    font-size: 14px;
    line-height: 1.65;
    color: rgba(255, 255, 255, 0.8);
}

/* -------------------------------------------------------------------------
   6. Curated Gallery & Lightbox
   ------------------------------------------------------------------------- */
.project-gallery-section {
    padding: 85px 0 95px;
    background: #0f0205;
    color: #ffffff;
    border-top: 1px solid rgba(207, 168, 89, 0.3);
}

.gallery-grid-title {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(26px, 2.6vw, 36px);
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 10px;
}
.gallery-grid-title span {
    color: var(--champagne-gold, #cfa859);
}

.gallery-masonry-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
    margin-top: 36px;
}

.gallery-item-card {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    height: 380px;
    border: 1px solid rgba(207, 168, 89, 0.3);
    cursor: pointer;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    transition: all 0.35s ease;
}
.gallery-item-card:first-child {
    grid-column: span 2;
    height: 480px;
}
.gallery-item-card:nth-child(4) {
    grid-column: span 2;
    height: 480px;
}

.gallery-item-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
}

.gallery-item-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, transparent 40%, rgba(10, 1, 3, 0.85) 100%);
    opacity: 0;
    display: flex;
    align-items: flex-end;
    padding: 24px;
    transition: opacity 0.3s ease;
}
.gallery-item-card:hover img {
    transform: scale(1.06);
}
.gallery-item-card:hover .gallery-item-overlay {
    opacity: 1;
}

.gallery-expand-pill {
    background: var(--royal-burgundy, #6b1426);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: #ffffff;
    padding: 8px 18px;
    border-radius: 30px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

/* -------------------------------------------------------------------------
   7. Next & Previous Project Switcher
   ------------------------------------------------------------------------- */
.project-nav-section {
    background: #180309;
    padding: 50px 0;
    border-top: 1px solid rgba(207, 168, 89, 0.25);
    border-bottom: 2px solid var(--champagne-gold, #cfa859);
}

.project-nav-btn {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 18px 24px;
    border-radius: 16px;
    background: rgba(35, 5, 13, 0.7);
    border: 1px solid rgba(207, 168, 89, 0.3);
    color: #ffffff !important;
    text-decoration: none !important;
    transition: all 0.3s ease;
}
.project-nav-btn:hover {
    background: var(--royal-burgundy, #6b1426);
    border-color: var(--champagne-gold, #cfa859);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(107, 20, 38, 0.5);
}

.project-nav-arrow {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: rgba(207, 168, 89, 0.15);
    color: #ffd875;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
}

.project-nav-label {
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    color: var(--champagne-gold, #cfa859);
    margin-bottom: 2px;
}

.project-nav-name {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: 16px;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
}

/* -------------------------------------------------------------------------
   8. VIP Date Inquiry CTA
   ------------------------------------------------------------------------- */
.project-cta-section {
    padding: 85px 0 90px;
    background: linear-gradient(135deg, #24050e 0%, #150207 100%);
    color: #ffffff;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.cta-eyebrow {
    color: var(--champagne-gold, #cfa859);
    font-family: 'Space Grotesk', -apple-system, sans-serif;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 12px;
}

.cta-headline {
    font-family: 'Playfair Display', Georgia, serif;
    font-size: clamp(30px, 3.4vw, 46px);
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 16px;
}
.cta-headline span {
    color: var(--champagne-gold, #cfa859);
}

.cta-lead {
    font-size: 16px;
    max-width: 650px;
    margin: 0 auto 34px;
    color: rgba(255, 255, 255, 0.85);
    line-height: 1.7;
}

.btn-cta-inquire {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, var(--royal-burgundy, #6b1426), #4a0d1a);
    border: 2px solid var(--champagne-gold, #cfa859);
    color: #ffffff !important;
    padding: 14px 34px;
    border-radius: 35px;
    font-family: var(--body, 'Poppins', sans-serif);
    font-size: 14.5px;
    font-weight: 800;
    text-decoration: none !important;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    box-shadow: 0 10px 30px rgba(107, 20, 38, 0.45);
    transition: all 0.3s ease;
}
.btn-cta-inquire:hover {
    background: var(--champagne-gold, #cfa859);
    color: #24050d !important;
    border-color: #ffd875;
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 14px 40px rgba(207, 168, 89, 0.4);
}

/* Lightbox overlay */
.project-lightbox {
    position: fixed;
    inset: 0;
    background: rgba(4, 0, 2, 0.95);
    backdrop-filter: blur(20px);
    z-index: 9999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 30px;
}
.project-lightbox.active {
    display: flex;
}
.lightbox-img-wrap {
    max-width: 90vw;
    max-height: 85vh;
}
.lightbox-img-wrap img {
    max-width: 100%;
    max-height: 85vh;
    object-fit: contain;
    border-radius: 12px;
    border: 2px solid var(--champagne-gold, #cfa859);
}
.lightbox-close-btn {
    position: absolute;
    top: 24px;
    right: 28px;
    background: rgba(255, 255, 255, 0.15);
    border: 1px solid var(--champagne-gold, #cfa859);
    color: #ffffff;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    transition: all 0.2s ease;
}
.lightbox-close-btn:hover {
    background: var(--royal-burgundy, #6b1426);
}

/* Responsive queries */
@media (max-width: 991px) {
    .slate-grid, .stats-counter-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .gallery-masonry-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .gallery-item-card:first-child,
    .gallery-item-card:nth-child(4) {
        grid-column: span 1;
        height: 340px;
    }
    .project-detail-hero {
        min-height: 70vh;
        padding-bottom: 50px;
    }
}
@media (max-width: 576px) {
    .slate-grid, .stats-counter-grid {
        grid-template-columns: 1fr;
    }
    .gallery-masonry-grid {
        grid-template-columns: 1fr;
    }
    .project-detail-hero {
        min-height: 65vh;
    }
}
</style>

<!-- =======================================================================
     1. Full-Screen Cinematic Cover Hero Section
     ======================================================================= -->
<section class="project-detail-hero" aria-label="<?= htmlspecialchars($project['title']) ?> Cover Hero">
    <div class="project-hero-media-wrap">
        <img src="<?= $appBasePath ?>/<?= $project['cover_image'] ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="project-hero-img">
        <div class="project-hero-vignette"></div>
    </div>

    <div class="container position-relative" style="z-index: 10;">
        <div class="project-hero-content">
            <!-- Back to Home / Masterpiece Portfolio Link -->
            <a href="<?= $appBasePath ?>/#cinematicCardsSection" class="project-back-pill">
                <i class="bi bi-arrow-left"></i>
                <span>Back to Masterpiece Portfolio</span>
            </a>

            <div>
                <span class="project-category-badge"><?= htmlspecialchars($project['tag']) ?></span>
            </div>

            <h1 class="project-hero-title">
                <?= htmlspecialchars($project['title']) ?>
            </h1>

            <div class="project-meta-strip">
                <div class="project-meta-item">
                    <i class="bi bi-heart-fill text-danger"></i>
                    <span><strong>Couple:</strong> <?= htmlspecialchars($project['couple']) ?></span>
                </div>
                <div class="project-meta-item">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span><strong>Venue:</strong> <?= htmlspecialchars($project['location']) ?></span>
                </div>
                <div class="project-meta-item">
                    <i class="bi bi-camera-reels-fill"></i>
                    <span><strong>Optics:</strong> <?= htmlspecialchars($project['optics']) ?></span>
                </div>
                <div class="project-meta-item">
                    <i class="bi bi-calendar-event-fill"></i>
                    <span><?= $project['date'] ?></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =======================================================================
     2. Behind-The-Lens Production Slate & Camera Telemetry
     ======================================================================= -->
<section class="project-slate-section" aria-label="Technical Cinematography Specifications">
    <div class="container">
        <div class="slate-grid">
            <div class="slate-box">
                <div class="slate-label">
                    <i class="bi bi-camera-video-fill"></i>
                    <span>Cinema Cameras</span>
                </div>
                <div class="slate-val"><?= $project['camera'] ?></div>
            </div>

            <div class="slate-box">
                <div class="slate-label">
                    <i class="bi bi-record-circle-fill"></i>
                    <span>Master Lenses</span>
                </div>
                <div class="slate-val"><?= $project['lenses'] ?></div>
            </div>

            <div class="slate-box">
                <div class="slate-label">
                    <i class="bi bi-palette-fill"></i>
                    <span>Color Profile</span>
                </div>
                <div class="slate-val"><?= $project['color'] ?></div>
            </div>

            <div class="slate-box">
                <div class="slate-label">
                    <i class="bi bi-badge-4k-fill"></i>
                    <span>Aerial &amp; Stabilizers</span>
                </div>
                <div class="slate-val"><?= $project['aerial'] ?></div>
            </div>
        </div>
    </div>
</section>

<!-- =======================================================================
     3. Production Stats Counter Bar
     ======================================================================= -->
<section class="production-stats-bar">
    <div class="container">
        <div class="stats-counter-grid">
            <div>
                <div class="stat-number"><?= $project['raw_count'] ?></div>
                <div class="stat-desc">Raw Clicks Captured</div>
            </div>
            <div>
                <div class="stat-number"><?= $project['curated_count'] ?></div>
                <div class="stat-desc">Curated Master Frames</div>
            </div>
            <div>
                <div class="stat-number"><?= $project['album_spreads'] ?></div>
                <div class="stat-desc">Heirloom Album Spreads</div>
            </div>
            <div>
                <div class="stat-number">4K 10-Bit</div>
                <div class="stat-desc">Director's Master Cut</div>
            </div>
        </div>
    </div>
</section>

<!-- =======================================================================
     4. Chapter 1 & 2: The Brief, Creative Vision & Location Recce
     ======================================================================= -->
<section class="project-doc-section">
    <div class="container">
        <div class="row g-5 align-items-center mb-5">
            <div class="col-lg-7">
                <span class="chapter-number-pill">CHAPTER 01 // THE VISION</span>
                <h2 class="doc-chapter-title">
                    The Creative Brief &amp; Royal Concept for <span><?= htmlspecialchars($project['couple']) ?></span>
                </h2>
                <p class="doc-chapter-lead">
                    <?= htmlspecialchars($project['desc']) ?>
                </p>
                <p class="doc-chapter-p">
                    <?= htmlspecialchars($project['narrative_1']) ?>
                </p>
                <p class="doc-chapter-p">
                    <?= htmlspecialchars($project['narrative_2']) ?>
                </p>
            </div>
            <div class="col-lg-5">
                <div style="background: linear-gradient(145deg, #2b0610 0%, #150207 100%); border-radius: 20px; border: 1.5px solid var(--champagne-gold, #cfa859); padding: 36px; color: #ffffff; box-shadow: 0 16px 40px rgba(107, 20, 38, 0.25);">
                    <div style="font-size: 26px; color: var(--champagne-gold, #cfa859); margin-bottom: 12px;">&ldquo;</div>
                    <p style="font-family: 'Playfair Display', Georgia, serif; font-size: 18px; font-style: italic; line-height: 1.65; margin-bottom: 20px;">
                        <?= htmlspecialchars($project['quote']) ?>
                    </p>
                    <div style="font-family: 'Space Grotesk', -apple-system, sans-serif; font-size: 13px; font-weight: 800; color: #ffd875; text-transform: uppercase;">
                        <?= htmlspecialchars($project['couple']) ?>
                    </div>
                    <div style="font-size: 11px; color: rgba(255, 255, 255, 0.7); text-transform: uppercase;">
                        Verified WoW Studio Royal Couple &bull; 5-Star Praise
                    </div>
                </div>
            </div>
        </div>

        <hr style="border-color: rgba(207, 168, 89, 0.35); margin: 60px 0;">

        <!-- ===================================================================
             Chapter 3: Chronological Shooting Journey (Photo-by-Photo Story)
             =================================================================== -->
        <div>
            <div class="text-center mb-5">
                <span class="chapter-number-pill">CHAPTER 02 // DAY-BY-DAY SHOOT JOURNEY</span>
                <h2 class="doc-chapter-title" style="margin-bottom: 12px;">
                    How The Story Was Captured &bull; Start to End
                </h2>
                <p style="max-width: 680px; margin: 0 auto; font-size: 15.5px; color: #5c4f4b;">
                    A behind-the-scenes photographic journal tracking each ceremonial stage, the camera optics chosen, and the directorial approach.
                </p>
            </div>

            <div class="row">
                <?php foreach ($project['timeline'] as $tItem): ?>
                    <div class="col-lg-6">
                        <div class="timeline-card-item">
                            <div class="timeline-img-wrap">
                                <img src="<?= $appBasePath ?>/<?= $tItem['image'] ?>" alt="<?= htmlspecialchars($tItem['title']) ?>" loading="lazy">
                                <div class="timeline-time-badge"><?= $tItem['time'] ?></div>
                            </div>
                            <div class="timeline-body">
                                <div class="timeline-gear-meta">
                                    <i class="bi bi-camera"></i> <?= $tItem['gear'] ?>
                                </div>
                                <h3 class="timeline-title"><?= htmlspecialchars($tItem['title']) ?></h3>
                                <p class="timeline-desc"><?= htmlspecialchars($tItem['desc']) ?></p>
                                <div class="curation-logic-box">
                                    <strong><i class="bi bi-check2-circle"></i> Curation Logic:</strong> <?= htmlspecialchars($tItem['curation']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- =======================================================================
     5. Chapter 4: Kaise Photo Pick Hua — Curation Philosophy
     ======================================================================= -->
<section class="curation-science-section">
    <div class="container">
        <div class="text-center mb-5">
            <span class="project-category-badge">CHAPTER 03 // CURATION SCIENCE</span>
            <h2 class="gallery-grid-title">
                Kaise Photo Pick Hua &bull; <span>The 3-Pass Curation Philosophy</span>
            </h2>
            <p style="max-width: 720px; margin: 0 auto; font-size: 15.5px; color: rgba(255, 255, 255, 0.8);">
                Out of <?= $project['raw_count'] ?> raw shutter releases, how did our creative directors distill the wedding down to <?= $project['curated_count'] ?> master frames and <?= $project['album_spreads'] ?> heirloom album spreads?
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="culling-pass-box">
                    <div class="culling-pass-number">PASS 01 &bull; TECHNICAL INTEGRITY</div>
                    <h3 class="culling-pass-title">Micro-Sharpness &amp; Iris Focus</h3>
                    <p class="culling-pass-desc">
                        Every single raw file is inspected at 200% magnification on calibrated Eizo color grading displays. Any micro-motion shake, missed iris focus, or awkward eye-blink is immediately culled. Only pin-sharp frames qualify for Pass 2.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="culling-pass-box">
                    <div class="culling-pass-number">PASS 02 &bull; EMOTIONAL RESONANCE</div>
                    <h3 class="culling-pass-title">Unstaged Truth Over Poses</h3>
                    <p class="culling-pass-desc">
                        We deliberately reject stiff, artificial smile poses in favor of genuine emotion—a tear gently wiped away by the father of the bride, an unscripted burst of laughter, and private glances exchanged during the sacred vows.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="culling-pass-box">
                    <div class="culling-pass-number">PASS 03 &bull; STORY ARC HARMONY</div>
                    <h3 class="culling-pass-title">Macro Detail to Grand Architecture</h3>
                    <p class="culling-pass-desc">
                        The final album must read like a cinematic film. We balance intimate macro frames (antique polki jewelry, hand-tied sacred threads) against grand 16:9 palace establishing shots to create visual rhythm on every spread.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =======================================================================
     6. Curated High-Resolution Editorial Photo Gallery
     ======================================================================= -->
<section class="project-gallery-section" aria-label="Curated Project Photography Gallery">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3">
            <div>
                <span class="project-category-badge">CHAPTER 04 // MASTER PRINTS</span>
                <h2 class="gallery-grid-title">
                    Curated Photographic <span>Moments.</span>
                </h2>
                <p style="color: rgba(255, 255, 255, 0.7); font-size: 14.5px; margin: 0;">
                    Click any photograph to view high-resolution fullscreen preview with master color grading.
                </p>
            </div>
            <div>
                <a href="<?= $appBasePath ?>/gallery" class="btn btn-sm btn-gold-outline" style="color: #ffd875; border: 1px solid var(--champagne-gold, #cfa859); padding: 8px 18px; border-radius: 20px; text-decoration: none;">
                    <span>View All Galleries</span> &rarr;
                </a>
            </div>
        </div>

        <div class="gallery-masonry-grid" id="projectGalleryGrid">
            <?php foreach ($project['gallery'] as $imgIdx => $imgSrc): ?>
                <div class="gallery-item-card" data-full-src="<?= $appBasePath ?>/<?= $imgSrc ?>">
                    <img src="<?= $appBasePath ?>/<?= $imgSrc ?>" alt="<?= htmlspecialchars($project['title']) ?> Frame <?= $imgIdx + 1 ?>" loading="lazy">
                    <div class="gallery-item-overlay">
                        <span class="gallery-expand-pill">
                            <i class="bi bi-arrows-fullscreen"></i>
                            <span>View Fullscreen</span>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =======================================================================
     7. Next & Previous Project Navigation Switcher
     ======================================================================= -->
<section class="project-nav-section" aria-label="Adjacent Masterpiece Navigation">
    <div class="container">
        <div class="row g-4 justify-content-between align-items-center">
            <!-- Prev Project Button -->
            <div class="col-md-6">
                <a href="<?= $appBasePath ?>/project-detail?id=<?= $prevProject['id'] ?>" class="project-nav-btn">
                    <span class="project-nav-arrow"><i class="bi bi-arrow-left"></i></span>
                    <div>
                        <div class="project-nav-label">&larr; Previous Masterpiece</div>
                        <h4 class="project-nav-name"><?= htmlspecialchars($prevProject['title']) ?></h4>
                    </div>
                </a>
            </div>

            <!-- Next Project Button -->
            <div class="col-md-6">
                <a href="<?= $appBasePath ?>/project-detail?id=<?= $nextProject['id'] ?>" class="project-nav-btn justify-content-end text-end">
                    <div>
                        <div class="project-nav-label">Next Masterpiece &rarr;</div>
                        <h4 class="project-nav-name"><?= htmlspecialchars($nextProject['title']) ?></h4>
                    </div>
                    <span class="project-nav-arrow"><i class="bi bi-arrow-right"></i></span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- =======================================================================
     8. VIP Date Inquiry & Booking CTA Section
     ======================================================================= -->
<section class="project-cta-section" aria-label="Book Your Wedding Date">
    <div class="container">
        <div class="cta-eyebrow">CAPTURE YOUR ROYAL CELEBRATION</div>
        <h2 class="cta-headline">
            Your Story Deserves To Be A <span>Masterpiece.</span>
        </h2>
        <p class="cta-lead">
            Whether you are planning a palatial royal wedding in Rajasthan or a romantic destination escape, our master visual crew is ready to document your love story with Hollywood-grade cinema optics.
        </p>
        <a href="<?= $appBasePath ?>/rsvp" class="btn-cta-inquire">
            <i class="bi bi-calendar2-check-fill"></i>
            <span>Inquire Your Wedding Dates &rarr;</span>
        </a>
    </div>
</section>

<!-- Fullscreen Lightbox Modal -->
<div class="project-lightbox" id="projectLightbox" aria-hidden="true">
    <button class="lightbox-close-btn" id="lightboxCloseBtn" aria-label="Close Lightbox">
        <i class="bi bi-x-lg"></i>
    </button>
    <div class="lightbox-img-wrap">
        <img src="" id="lightboxActiveImg" alt="Enlarged Project Frame">
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const galleryCards = document.querySelectorAll('.gallery-item-card');
    const lightbox = document.getElementById('projectLightbox');
    const lightboxImg = document.getElementById('lightboxActiveImg');
    const lightboxClose = document.getElementById('lightboxCloseBtn');

    if (galleryCards.length && lightbox && lightboxImg) {
        galleryCards.forEach(card => {
            card.addEventListener('click', function() {
                const src = card.getAttribute('data-full-src');
                if (src) {
                    lightboxImg.src = src;
                    lightbox.classList.add('active');
                }
            });
        });

        if (lightboxClose) {
            lightboxClose.addEventListener('click', function() {
                lightbox.classList.remove('active');
            });
        }

        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                lightbox.classList.remove('active');
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && lightbox.classList.contains('active')) {
                lightbox.classList.remove('active');
            }
        });
    }
});
</script>
