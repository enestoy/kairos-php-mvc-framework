<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Kairos Dashboard</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        :root {
            --dark-purple: #2c065d;
            --medium-purple: #5c2a9d;
            --light-purple: #7a4acb;
            --white: #fff;
            --exit-red: #b366ff;
            /* Mor tonuna yakın, yumuşak kırmızı */
        }

        /* Body ve container düzeni */
   body, html {
  height: 100%;
  margin: 0;
  background-color: var(--dark-purple);
  color: var(--white);
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

     #app {
  flex: 1 0 auto;
  display: flex;
  /* flex-direction: row; default */
}

       #sidebar {
  width: 250px;
  background-color: var(--medium-purple);
  display: flex;
  flex-direction: column;
  padding: 1.5rem 1rem;
  color: var(--white);
  user-select: none;
}

        #sidebar h3 {
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 700;
            letter-spacing: 2px;
            user-select: none;
        }

        #sidebar .nav-link {
            color: var(--white);
            font-weight: 500;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 0.3rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: background-color 0.25s ease;
            user-select: none;
        }

        #sidebar .nav-link i {
            font-size: 1.3rem;
        }

        #sidebar .nav-link:hover {
            background-color: var(--light-purple);
            color: var(--white);
            text-decoration: none;
        }

        #sidebar .nav-link.active {
            background: linear-gradient(90deg, #9c6fff, #7a4acb);
            box-shadow: 0 0 10px #9c6fff;
            color: var(--white);
        }

        /* Çıkış linki */
        #sidebar .nav-link.exit {

            color: #d9a9ff;
            /* Daha parlak mor-pembe ton */
            font-weight: 700;
            font-size: 1.1rem;
            letter-spacing: 0.05em;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        #sidebar .nav-link.exit:hover {
            background-color: rgba(217, 169, 255, 0.15);
            /* Daha şeffaf ve yumuşak */
            color: #d6aaff;
            /* Parlaklık biraz azaltıldı */
            text-shadow: 0 0 6px rgba(214, 170, 255, 0.6);
            /* Hafif, yumuşak ışık */
            transition: color 0.3s ease, background-color 0.3s ease, text-shadow 0.3s ease;
        }


#content {
  flex-grow: 1;
  padding: 3rem 4rem;   /* Yatay padding biraz arttı geniş ekran için */
  background: var(--dark-purple);
  overflow: visible;
  min-height: auto;
  box-sizing: border-box;
  width: 100%;        /* Tam genişlik ver */
  max-width: 100vw;   /* Taşma önle */
}



        /* Üst navbar */
        #topnav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--medium-purple);
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            color: var(--white);
            margin-bottom: 1.8rem;
            user-select: none;
        }

        #topnav .sidebar-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            background: none;
            border: none;
            color: var(--white);
        }

        /* Kartlar */
        .dashboard-card {
            background-color: var(--medium-purple);
            border-radius: 0.75rem;
            padding: 1.5rem;
            color: var(--white);
            box-shadow: 0 3px 10px rgb(0 0 0 / 0.3);
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: default;
            user-select: none;
            flex: 1 1 auto;
            min-height: 150px;
        }

        .dashboard-card:hover {
            background-color: var(--light-purple);
        }

        .dashboard-card h5 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .dashboard-card .card-icon {
            font-size: 2.8rem;
            opacity: 0.75;
        }

       /* footer zaten aşağıda flex-shrink: 0; */
footer {
  flex-shrink: 0;
  background-color: var(--medium-purple);
  color: var(--white);
  text-align: center;
  padding: 0.75rem 1rem;
  font-size: 0.9rem;
  user-select: none;
}

        /* Responsive ayarlar */
        @media (max-width: 991.98px) {
            #app {
                flex-direction: column;
            }

            #sidebar {
                width: 100%;
                height: auto;
                flex-direction: row;
                padding: 0.5rem;
                overflow-x: auto;
            }

            #sidebar .nav-link {
                flex: 1 0 auto;
                margin-bottom: 0;
                justify-content: center;
                padding: 0.5rem 0.75rem;
                font-size: 0.9rem;
            }

            #sidebar .nav-link.exit {
                margin-left: auto;
                color: var(--exit-red);
            }

            #topnav .sidebar-toggle {
                display: inline-block;
            }
        }

        .bg-purple {
            background-color: var(--medium-purple) !important;
        }

        /* Offcanvas genişliğini sabitleyelim */
        .offcanvas-start {
            --bs-offcanvas-width: 250px;
        }

        
    </style>
</head>

<body class="d-flex flex-column min-vh-100 bg-purple text-white">