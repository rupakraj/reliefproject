--
-- Dumping data for table `tbl_accessibilities`
--

INSERT INTO `tbl_accessibilities` (`id`, `name`, `created_by`, `modified_by`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'By walk', 1, 1, '2015-05-03 12:28:58', '2015-05-03 06:43:58', 0),
(2, 'Two wheeler', 1, 1, '2015-05-03 12:29:08', '2015-05-03 06:44:08', 0),
(3, 'Four wheeler', 1, 1, '2015-05-03 12:29:17', '2015-05-03 06:44:17', 0),
(4, 'By air', 1, 1, '2015-05-03 12:29:23', '2015-05-03 06:44:23', 0);

--
-- Dumping data for table `tbl_areas`
--

INSERT INTO `tbl_areas` (`id`, `code`, `name`, `district`, `vdc_mun_id`, `ward`, `address`, `location_category`, `population_male`, `population_female`, `population_children`, `population_adult`, `population_old`, `household`, `houses`, `schools`, `effected_male`, `effected_female`, `effected_children`, `effected_adult`, `effected_old`, `effected_household`, `houses_collapsed`, `houses_damaged`, `houses_cracked`, `death`, `trapped`, `sick`, `accessibility_id`, `distance_ktm`, `area_type`, `road_obstructed`, `road_obstruct_detail`, `created_by`, `modified_by`, `created_date`, `modified_date`, `reported_date`, `first_followup`, `priority`, `contact_detail`, `internal_contact`, `security_contact`, `nearest_hospital_distance`, `nearest_hospital_name`, `nearest_hospital_contact`, `longitude`, `latitude`, `delete_flag`) VALUES
(1, '001', 'Barpak', '4748', 0, 10, 'barpak', 0, 100, 150, 50, 200, 50, 100, 70, 10, 100, 100, 50, 100, 40, 100, 10, 10, 10, 100, 100, 100, 1, 150, '1', 1, '1', 1, 1, '2015-05-03 12:35:19', '2015-05-03 06:50:19', '2015-05-03 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0),
(2, '002', 'sindhu', '4736', 0, 5, 'sindhupalchowk', 0, 200, 300, 100, 200, 150, 100, 50, 15, 100, 100, 100, 100, 100, 40, 40, 50, 50, 100, 100, 100, 4, 0, '2', 1, '2', 1, 1, '2015-05-03 12:38:42', '2015-05-03 06:53:42', '2015-05-03 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', 0);

--
-- Dumping data for table `tbl_area_req_items`
--

INSERT INTO `tbl_area_req_items` (`id`, `area_id`, `item_id`, `quantity`, `created_by`, `modified_by`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 1, 1, 10, 1, 1, '2015-05-03 12:48:27', '2015-05-03 07:03:27', 0),
(2, 1, 3, 100, 1, 1, '2015-05-03 13:07:09', '2015-05-03 07:22:09', 0);

--
-- Dumping data for table `tbl_area_types`
--

INSERT INTO `tbl_area_types` (`id`, `name`, `created_by`, `modified_by`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'Mountain', 1, 1, '2015-05-03 12:31:09', '2015-05-03 06:46:09', 0),
(2, 'Hill', 1, 1, '2015-05-03 12:31:13', '2015-05-03 06:46:13', 0),
(3, 'Valley', 1, 1, '2015-05-03 12:31:19', '2015-05-03 06:46:19', 0);

--
-- Dumping data for table `tbl_delivered_items`
--

INSERT INTO `tbl_delivered_items` (`id`, `area_id`, `organization_id`, `item_id`, `delivered_date`, `quantity`, `created_by`, `modified_by`, `created_date`, `modified_date`) VALUES
(1, 1, 2, 1, '2015-05-01', 5, 1, 1, '2015-05-03 13:02:49', '2015-05-03 07:17:49'),
(2, 2, 1, 1, '2015-05-03', 10, 1, 1, '2015-05-03 13:05:52', '2015-05-03 07:20:52');

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`id`, `name`, `unit_id`, `is_recurring`, `expected_till`, `created_by`, `modified_by`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'Water', 2, 1, '2015-05-03', 1, 1, '2015-05-03 12:32:01', '2015-05-03 06:47:01', 0),
(2, 'Salt', 4, 1, '2015-05-03', 1, 1, '2015-05-03 12:32:09', '2015-05-03 06:47:09', 0),
(3, 'Tents', 5, 0, '2015-05-03', 1, 1, '2015-05-03 12:32:18', '2015-05-03 06:47:18', 0),
(4, 'Rice', 1, 1, '2015-05-03', 1, 1, '2015-05-03 12:32:28', '2015-05-03 06:47:28', 0);

--
-- Dumping data for table `tbl_obstruction_types`
--

INSERT INTO `tbl_obstruction_types` (`id`, `name`, `created_by`, `modified_by`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'Landslide', 1, 1, '2015-05-03 12:31:29', '2015-05-03 06:46:29', 0),
(2, 'Road damage', 1, 1, '2015-05-03 12:31:42', '2015-05-03 06:46:42', 0);

--
-- Dumping data for table `tbl_organizations`
--

INSERT INTO `tbl_organizations` (`id`, `code`, `organization_name`, `specialization`, `start_date`, `end_date`, `total_volunteer`, `contact_details`, `country`, `contact_name`, `contact_phone`, `contact_email`, `created_by`, `modified_by`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, '001', 'Youth club ktm', 'medical', '2015-05-03', '2015-05-03', 10, NULL, 'Nepal', 'ram', '987654', 'ram@hotmail.com', 1, 1, '2015-05-03 12:36:11', '2015-05-03 06:51:11', 0),
(2, '002', 'Rescue team china', 'rescue,medical', '2015-05-03', '2015-05-03', 50, NULL, 'China', 'john doe', '789455612', 'john@hotmail.com', 1, 1, '2015-05-03 12:37:02', '2015-05-03 06:52:02', 0);

--
-- Dumping data for table `tbl_organization_interestareas`
--

INSERT INTO `tbl_organization_interestareas` (`id`, `area_id`, `organization_id`, `created_by`, `modified_by`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 1, 1, '2015-05-03 12:38:58', '2015-05-03 06:53:58');

--
-- Dumping data for table `tbl_organization_workareas`
--

INSERT INTO `tbl_organization_workareas` (`id`, `area_id`, `organization_id`, `start_date`, `end_date`, `created_by`, `modified_by`, `created_date`, `modified_date`) VALUES
(1, 1, 1, '2015-05-01', '2015-05-09', 1, 1, '2015-05-03 12:39:22', '2015-05-03 06:54:22');

--
-- Dumping data for table `tbl_skills`
--

INSERT INTO `tbl_skills` (`id`, `name`, `created_by`, `modified_by`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'rescue', 1, 1, '2015-05-03 12:23:15', '2015-05-03 06:38:15', 0),
(2, 'first aid', 1, 1, '2015-05-03 12:25:50', '2015-05-03 06:40:50', 0),
(3, 'cooking', 1, 1, '2015-05-03 12:26:14', '2015-05-03 06:41:14', 0);

--
-- Dumping data for table `tbl_specializations`
--

INSERT INTO `tbl_specializations` (`id`, `name`, `created_by`, `modified_by`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'rescue', 1, 1, '2015-05-03 12:27:13', '2015-05-03 06:42:13', 0),
(2, 'medical', 1, 1, '2015-05-03 12:27:20', '2015-05-03 06:42:20', 0);

--
-- Dumping data for table `tbl_units`
--

INSERT INTO `tbl_units` (`id`, `name`, `created_by`, `modified_by`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'kg', 1, 1, '2015-05-03 12:26:20', '2015-05-03 06:41:20', 0),
(2, 'litre', 0, 1, '0000-00-00 00:00:00', '2015-05-03 06:41:33', 0),
(3, 'bottles', 1, 1, '2015-05-03 12:26:47', '2015-05-03 06:41:47', 0),
(4, 'packets', 1, 1, '2015-05-03 12:26:55', '2015-05-03 06:41:55', 0),
(5, 'units', 1, 1, '2015-05-03 12:27:04', '2015-05-03 06:42:04', 0);

--
-- Dumping data for table `tbl_vehicle_types`
--

INSERT INTO `tbl_vehicle_types` (`id`, `name`, `created_by`, `modified_by`, `created_date`, `modified_date`, `delete_flag`) VALUES
(1, 'Trucks', 1, 1, '2015-05-03 12:29:32', '2015-05-03 06:44:32', 0),
(2, 'Helicopter', 1, 1, '2015-05-03 12:29:39', '2015-05-03 06:44:39', 0),
(3, 'Jeep', 1, 1, '2015-05-03 12:29:45', '2015-05-03 06:44:45', 0),
(4, 'Two wheeler', 1, 1, '2015-05-03 12:29:53', '2015-05-03 06:44:53', 0);
