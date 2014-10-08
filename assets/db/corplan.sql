-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2014 at 03:07 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `corplan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dependency`
--

CREATE TABLE IF NOT EXISTS `dependency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `initiative_1` int(11) NOT NULL,
  `initiative_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `initiative`
--

CREATE TABLE IF NOT EXISTS `initiative` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `program_id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  `tier` int(11) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `kickoff` varchar(600) DEFAULT NULL,
  `completion` varchar(600) DEFAULT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `end` (`end`),
  KEY `program_id` (`program_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=212 ;

--
-- Dumping data for table `initiative`
--

INSERT INTO `initiative` (`id`, `title`, `program_id`, `code`, `tier`, `start`, `end`, `kickoff`, `completion`, `description`) VALUES
(2, 'Align and Map (existing) Client Tiering', 1, '1.1.A', 1, '2014-07-01', '2014-12-01', '', '', ''),
(3, 'Define Service Point; Formalize and Unify SLAs', 1, '1.1.B', 1, '2014-08-01', '2015-05-01', '', '', ''),
(4, 'Build Out Sector Branding', 3, '1.3.A', 2, '2015-01-14', '2016-05-31', '', '', ''),
(5, 'Upgrade Capital Markets Offering', 4, '1.4.E', 3, '2014-04-01', '2015-12-01', '', '', ''),
(6, 'Upgrade SCF', 4, '1.4.A', 1, '2014-03-21', '2016-11-01', '', '', ''),
(10, 'Enhance Service Levels', 1, '1.1.C', 0, '2015-05-01', '2015-11-01', '', '', ''),
(11, 'Implement Full CST Service Model', 1, '1.1.E', 0, '2014-11-01', '2016-11-01', '', '', ''),
(12, 'Establish Credit Analyst Team', 1, '1.1.D', 0, '2014-06-01', '2014-12-01', '', '', ''),
(13, 'Upgrade CRM', 5, '1.5.B', 0, '2014-09-17', '2015-07-01', '', '', ''),
(14, 'Design and roll out integrated customer portal', 1, '1.1.F', 0, '2016-07-01', '2017-03-01', '', '', ''),
(15, 'Wholesale portfolio segmentation', 2, '1.2.A', 0, '2014-06-01', '2014-07-01', '', '', ''),
(16, 'Complete pilots for healthcare & ports and full roll out', 2, '1.2.B', 0, '2014-08-01', '2015-08-01', '', '', ''),
(17, 'Formalize & launch proposition of the 4 remaining sectors', 2, '1.2.C', 0, '2014-11-01', '2016-05-01', '', '', ''),
(18, 'Upgrade RM competency', 3, '1.3.B', 0, '2014-07-01', '2015-12-01', '', '', ''),
(19, 'Enhance information support', 3, '1.3.C', 0, '2015-01-01', '2015-07-01', '', '', ''),
(20, 'Upgrade MCM', 4, '1.4.B', 0, '2014-03-14', NULL, '', '', ''),
(21, 'Upgrade trade finance', 4, '1.4.C', 0, '2014-09-01', '2015-11-01', '', '', ''),
(22, 'Build out structured finance', 4, '1.4.D', 0, '2014-07-01', '2015-12-01', '', '', ''),
(23, 'Uparade Cross Border Offering', 4, '1.4.F', 0, '2014-04-01', '2015-12-01', '', '', ''),
(24, 'Upgrade FICS offering', 4, '1.4.G', 0, '2014-04-01', '2015-12-01', '', '', ''),
(25, 'Quick Fix for MCM (& SCF)', 4, '1.4.H', 0, '2014-09-01', '2014-11-01', '', '', ''),
(26, 'Priority client value chain solutions', 4, '1.4.I', 0, NULL, NULL, '', '', ''),
(27, 'Improve data management, capture and access', 5, '1.5.A', 0, '2015-01-01', '2015-07-01', '', '', ''),
(28, 'Upgrade MIS', 5, '1.5.C', 0, NULL, NULL, '', '', ''),
(29, 'Establish pricing strategy, map clients, formalize pricing policies', 7, '1.6.A', 0, '2016-11-01', '2017-04-01', '', '', ''),
(30, 'Establish pricing intelligence function', 7, '1.6.B', 0, NULL, NULL, '', '', ''),
(31, 'Pricing tool review and upgrade', 7, '1.6.C', 0, '2016-02-01', NULL, '', '', ''),
(47, 'Re-segment MSMEC business and agree on BU ownership', 21, '2.1.A', 0, '2014-07-14', '2014-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">\n			<ul>\n				<li>Develop new segmentation scheme for Micro, SME and Commercial clients based on company sales, CASA and lending criteria</li>\n				<li>Agree on service expectations for each segment and additional tiers within segments</li>\n				<li>Agree on BU ownership of each client segment</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(49, 'Launch Transition Program To Manage Migrating Clients', 21, '2.1.B', 0, '2015-01-01', '2015-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">\n			<ul>\n				<li>Identify clients who need to migrate to a different BU (for example, from Commercial to SME Banking) based on the new segmentation scheme</li>\n				<li>Develop on-boarding plan (communication plan, relationship handovers, new product offers) for migrating clients</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(50, 'Establish  Sector Solutions Working Group', 23, '2.2.A', 0, '2014-07-01', '2014-10-31', '0', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:102.0pt; width:489pt">\n			<ul>\n				<li>Establish &ldquo;Working Group&rdquo; structure, responsibility matrix and governance structure</li>\n				<li>Secure resources from respective BUs (i.e. WS / Retail / Distribution) to staff the &ldquo;Working Group&rdquo;</li>\n				<li>Migrate selected team members from other parts of the organization who have been leading &ldquo;Sector solution development&rdquo; work</li>\n				<li>Write job descriptions and identify talents in retail to occupy positions in RSS</li>\n				<li>Migrate selected team members from the Mass Banking VC Project to occupy positions in RSS; end Mass Banking VC project mandate</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(51, 'Lead And Roll Out Non-anchor Sector Initiatives', 23, '2.2.B', 0, '2014-10-31', '2015-10-31', '2.2.A', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:114.75pt; width:489pt">-Develop standard process to analyze opportunities in non-anchor sectors (i.e. Textile, Electronics / IT, Hospitality &amp; Tourism)<br />\n			-Using standard process, prioritize non-anchor sectors based on (a) assessing sector attractiveness (b) defining access points, (c) assessing competitive gaps<br />\n			-For prioritized sectors, develop &lsquo;go-to-market&rsquo; strategy consisting of product offerings, service level expectations and sales outreach program<br />\n			-Coordinate with GTB, Business Banking and Micro Banking to develop product pipeline and roll-out plan<br />\n			-Agree on service level expectations and sales outreach plan with Regional CEO and Area Managers in target markets</td>\n		</tr>\n	</tbody>\n</table>\n'),
(52, 'Assign RSS to support bank-wide initiatives', 23, '2.2.C', 0, '2014-10-31', '2020-12-31', '2.2.A', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Assign RSS members to participate in CSTs and define roles and responsibilities in the CST</td>\n		</tr>\n	</tbody>\n</table>\n'),
(53, 'Set Up Sector Reporting and Performance Tracking System', 23, '2.2.D', 0, '2014-11-01', '2015-01-01', '2.2.A', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:489pt">Set up reporting and performance tracking system to measure Mandiri&rsquo;s share of the sector and contribution by different BUs to overall effort</td>\n		</tr>\n	</tbody>\n</table>\n'),
(54, 'Finalize PBOs/RMs Coverage ', 36, '4.1.A', 0, '2014-10-08', '2015-01-01', '', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:76.5pt; width:386pt">\n			<ul>\n				<li>Define client tiering methodology</li>\n				<li>Design service model for priority banking and private banking</li>\n				<li>Detail back-end alignment with dedicated product and transaction teams to service private banking clients</li>\n				<li>Communicate new roles and job descriptions to PBOs/RMs</li>\n				<li>Map RMs to clients</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(55, 'Develop SME Ready Branches format and network selection (ie. Resource requirement, run pilot branch, etc)', 25, '2.3.A', 0, '2014-07-01', '2015-06-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:89.25pt; width:489pt">-Estimate SME potential at the area and branch level in coordination with Distribution Network<br />\n			-Determine SME ready branch format based on customer potential, taking into account presence of existing BB facilities (BBCs/Floor/Desks,<br />\n			&#39;-Estimate staffing requirements for SME CSOs, SME Tellers and RMs<br />\n			-Estimate investment and budgetary requirements<br />\n			&#39;-Select a set of branches in Java and outside Java to test SME Ready concept for a period of 12 months<br />\n			-Refine concept based on results of the pilot</td>\n		</tr>\n	</tbody>\n</table>\n'),
(56, 'Design Differentiated Product Suite', 36, '4.1.B', 0, '2014-07-01', '2015-04-01', '', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:386pt">\n			<ul>\n				<li>Develop differentiated product suite for priority banking and private banking</li>\n				<li>Coordinate with associated product groups to re-structure rates and fees according to updated service model</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(57, 'Develop training program for SME CSOs, RMs and branch managers', 25, '2.3.B', 0, '2014-10-01', '2014-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:489pt">-Develop updated curriculum for training of SME CSOs, RMs and branch managers on sales and servicing for SMEs<br />\n			-Launch training program in Mandiri University for eligible candidates</td>\n		</tr>\n	</tbody>\n</table>\n'),
(58, 'Develop and roll out improved Digital Banking user experience and features', 26, '2.4.A', 0, '2014-06-01', '2015-06-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">-Enhance user experience of internet and mobile banking applications<br />\n			-Introduce SME-specific differentiators, including separation of business and personal trx., and communication about usage of the digital platform<br />\n			-Improve delivery, i.e. package with EDCs and sector products</td>\n		</tr>\n	</tbody>\n</table>\n'),
(59, 'Conduct in-depth research to determine best-fit cash flow management solution with third party specialist', 26, '2.4.B', 0, '2014-07-14', '2015-03-15', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:489pt">-Conduct target group research and operational capability due diligence to understand need and scope of the solutions<br />\n			-If successful, develop cash flow managmenet tool with third party specialist</td>\n		</tr>\n	</tbody>\n</table>\n'),
(60, 'Incorporate Family Office-type Offering', 36, '4.1.C', 0, '2014-07-01', '2015-07-01', '', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:386pt">\n			<ul>\n				<li>Agree on elements of family office-type offer to provide to top tier private banking clients</li>\n				<li>Develop staged plan to recruit staff (for investment management services and education seminars) and roll out new services and programs (Mandiri banking services, sector research, M&amp;A services)</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(61, 'Develop proprietary accounting add-on offer with third-party specialist', 26, '2.4.C', 0, '2014-10-14', '2015-04-15', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">-Explore partnership with SME accounting specialist to develop a proprietary offer integrated with transaction banking platform</td>\n		</tr>\n	</tbody>\n</table>\n'),
(62, 'Communicate New Client Propositions and Back End Changes', 36, '4.1.D', 0, '2015-04-01', '2015-10-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:386pt">\n			<ul>\n				<li>Agree on message content and delivery channel</li>\n				<li>Pre-empt potential dis-satisfaction and managing PR</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(63, 'Automate on-boarding of Priority Banking Customers with ManSek and MMI', 53, '4.2.A', 0, NULL, NULL, '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:386pt">\n			<ul>\n				<li>Collaborate with MMI and ManSek on client sourcing, onboarding, products to offer and distribution</li>\n				<li>Design onboarding plan with MMI (for discretionary funds and advice) and ManSek (for brokerage account and research services)</li>\n				<li>Ensure compliance with BI and OJK regarding automated onboarding</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(64, 'Review current EDC performance, service model and vendors to upgrade EDC platform capabilities. ', 28, '2.5.A', 0, '2019-01-01', '2020-10-02', '5.4.D', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">\n			<ul>\n				<li>Review existing EDC vendors&rsquo; SLAs and work quality</li>\n				<li>Run survey to collect feedback from merchants on EDC performance and usage</li>\n				<li>Benchmark leading local peers in platform performance with regards to speed, reliability and features offered</li>\n				<li>Assess gap in capabilities and capabilities required</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(65, 'Build Network partners to distribute Mandiri structured notes offshore', 53, '4.2.B', 0, '2014-07-01', '2015-12-01', '', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:386pt">\n			<ul>\n				<li>Create a shortlist of potential partners in Singapore (i.e. private banks) and hold initial discussions to gauge interest and partnership possibilities</li>\n				<li>Propose terms with key banks and close distribution partnership agreements</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(66, 'Enable EDC value-added services (i.e. currency conversion, fund transfers, other transactional services)', 28, '2.5.B', 0, '2019-04-02', '2020-10-02', '2.5.A', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">\n			<ul>\n				<li>Generate list of features based on a combination of merchant feedback, peer benchmarking and internal ideation process and assess best features to pursue</li>\n				<li>Ensure features comply with Central Bank regulation</li>\n				<li>Work closely with IT to develop a timeline and provide support for feature development and roll out</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(67, 'Improve portfolio management by micro leadership in each level', 70, '3.1.A', 0, '2017-01-01', '2017-10-01', '5.6.B', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Implement RTTA process that has been effective in MBDCs level to be replicated for clusters and branch level</td>\n		</tr>\n	</tbody>\n</table>\n'),
(68, 'Develop Alliance to Offer Offshore Proposition to Mandiri’s Indonesian Clients ', 53, '4.2.C', 0, '2014-10-14', '2015-03-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:386pt">\n			<ul>\n				<li>Develop partnerships to source offshore products (e.g. Singapore bonds) to offer onshore Indonesian clients</li>\n				<li>Explore broader partnerships together with Treasury and ManSek to on a dynamic private banking alliance</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(69, 'Develop and roll out loyalty card program for merchants', 28, '2.5.C', 0, '2017-01-01', '2018-01-01', '5.7.D', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:489pt">-Run a survey and focus groups with merchants to determine features of a merchant loyalty card issuance and transaction monitoring program<br />\n			-Roll out program with a focus on existing merchant customers</td>\n		</tr>\n	</tbody>\n</table>\n'),
(70, 'Evolve early detection system and follow up mechanism', 70, '3.1.B', 0, NULL, NULL, '', '', ''),
(71, 'Develop and roll out cash flow based lending product', 28, '2.5.D', 0, '2021-01-01', '2022-01-01', '5.4.C', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">-Design merchant financing solution based on historical cash flow (i.e. fund and EDC transactions)<br />\n			-Roll out program with a focus on existing merchants, esp. loyal customers</td>\n		</tr>\n	</tbody>\n</table>\n'),
(72, 'Longer term investment in credit scoring methodology and dataset', 70, '3.1.C', 0, '2015-01-14', '2015-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">-Establish a reliable micro credit scoring methodology and spend resources and time to obtain the required data for an extended period of time</td>\n		</tr>\n	</tbody>\n</table>\n'),
(73, 'Develop and roll out mPOS solution', 28, '2.5.E', 0, '2019-01-01', '2019-07-01', '5.4.D', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">-Design mPOS solution in partnership with third-party specialist<br />\n			-Roll out program to both micro merchants and large players that might need mobility, e.g. the Post Office, food retailers<br />\n			-Form partnerships with retailers to take advantage of the large distribution network</td>\n		</tr>\n	</tbody>\n</table>\n'),
(74, 'Underwrite Offshore Collateral for Onshore Usage', 53, '4.2.D', 0, '2014-07-01', '2015-12-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:386pt">\n			<ul>\n				<li>Define eligible offshore markets (e.g. Singapore) based on combination of client potential and ease of underwriting</li>\n				<li>Develop underwriting process to assess offshore collateral in eligible markets (including partnerships to assess offshore collateral)</li>\n				<li>Ensure compliance with BI and OJK on offshore underwriting</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(75, 'Design and launch program to drive card usage to Mandiri EDCs via loyalty rewards and onboarding for new merchants', 28, '2.5.F', 0, '2017-01-01', '2017-07-01', '5.7.D', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">Initiate card activation program, targeting large merchants and new EDC merchants<br />\n			Develop program to reward customers for paying with Mandiri EDCs<br />\n			Launch marketing program to drive activation program<br />\n			Design onboarding program to direct card traffic to newly registered merchants</td>\n		</tr>\n	</tbody>\n</table>\n'),
(76, 'Corporate Social Responsibility movement on Micro Entrepreneurship', 71, '3.2.A', 0, '2014-07-14', '2014-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:39.0pt; width:489pt">-Develop active involvement from employees in micro distribution for better ownership and improving closeness to communities<br />\n			-Develop, standardized ready to use tools curriculum and guidance provided by head office</td>\n		</tr>\n	</tbody>\n</table>\n'),
(77, 'Targeting of ‘micro transitioners’ via regional distribution', 31, '2.6.A', 0, '2014-07-14', '2015-04-14', '', '2.1.A', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">-Joint working session between Distribution Network (Region, Area, Branch) and Business Banking to identify customers to target based on CASA and lending balance<br />\n			-Business Banking onboard customers with new product offers e.g. Mandiri Tabungan Bisnis, discounted EDC</td>\n		</tr>\n	</tbody>\n</table>\n'),
(78, 'Annual Micro Mandiri Awards and International Micro Seminars', 71, '3.2.B', 0, '2014-07-14', '2014-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:489pt">Finalized concept design for:<br />\n			-Mandiri Micro awards: given annually to local heroes, BPR, branches and employees with extraordinary contribution in Micro<br />\n			-Mandiri Micro Innovation awards: for basic but effective technology that is useful for development of micro enterprises</td>\n		</tr>\n	</tbody>\n</table>\n'),
(79, 'Develop startup kit to onboard new business owners', 31, '2.6.B', 0, '2014-07-14', '2014-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">-Conduct survey and focus groups to design startup kit most useful for new, cash-strap entrepreneurs<br />\n			-Design bundle with Mass Banking and GTB<br />\n			Roll out bundle at targeted startup forums / events</td>\n		</tr>\n	</tbody>\n</table>\n'),
(80, 'Quarterly Mandiri Micro Journal publication', 71, '3.2.C', 0, '2014-07-14', '2014-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">-Work with university/think tank to aggregate academic paper, review and publish journals<br />\n			-Publish Journals regularly for academic and public consumption and distribute</td>\n		</tr>\n	</tbody>\n</table>\n'),
(81, 'Providing pre-approved consumer loan offers to SME owners', 33, '2.7.A', 0, '2014-08-01', '2014-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:489pt">-Consumer Finance to work with Business Banking and Mass Banking to identify customers (with significant history with Mandiri) to provide pre-approved card and Consumer loans<br />\n			-Roll out card and loan offers via BBCs and branches</td>\n		</tr>\n	</tbody>\n</table>\n'),
(82, 'Build Self-service Smartphone / Online Customer App', 89, '4.3.A', 0, '2017-08-01', '2018-08-01', '5.1.E,5.1.K,5.1.L,5.1.M', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:76.5pt; width:386pt">\n			<ul>\n				<li>Design application requirements around key customer needs (i.e. access to asset portfolio information, research, news, and customer service contact, etc)</li>\n				<li>Benchmark peer applications (e.g. Citi Private Bank app) to identify relevant features and ways of use</li>\n				<li>Collaborate with IT (and third-party, if necessary) to develop application</li>\n				<li>Test and refine application with several clients and roll out post-testing</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(83, 'Joint planning (BB and Wealth Mgmt) to onboard SME BOs into Prioritas', 33, '2.7.B', 0, '2014-07-14', '2015-03-14', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">-Wealth management to work with Business Banking to pre-qualify SME customers for Prioritas service<br />\n			-Develop agreement on expected service levels in BB vs. Prioritas<br />\n			-Introduce mirroring KPIs / referral bonus to encourage working relationship</td>\n		</tr>\n	</tbody>\n</table>\n'),
(84, 'Branch expansion base on micro corplan 2020 to achieve total 4300 networks in 2020', 72, '3.3.A', 0, NULL, NULL, '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">-Establish the capability and database in Micro HO &amp; Districts to conduct desk research for the next best new market in semi annual basis<br />\n			-Implement a disciplined three step process and timeline in new market selection<br />\n			-Standardize criteria for organic growth in existing market</td>\n		</tr>\n	</tbody>\n</table>\n'),
(85, 'Review existing SME brand image and develop a new SME brand', 35, '2.8.A', 0, '2014-08-14', '2014-11-14', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:489pt">-Engage a brand consultant to review direction and alignment of existing SME brand image across related products, services and marketing communications<br />\n			-Conduct a survey to determine existing brand impact and positioning among SMEs in the market<br />\n			-With the help of a brand consultant, develop a compelling, consistent and focused SME brand for Mandiri to leverage across products and services</td>\n		</tr>\n	</tbody>\n</table>\n'),
(86, 'Launch marketing program to communicate new SME value proposition and brand', 35, '2.8.B', 0, '2015-01-05', '2015-06-05', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:489pt">-Marketing manager (in BB) coordinates with EBG and Mass Banking to review existing value proposition and target planned updates / changes<br />\n			-Develop integrated marketing communication program to deliver new value proposition and brand messaging<br />\n			-Work with Regional CEOs, Area Managers, and Electronic Banking to execute the program</td>\n		</tr>\n	</tbody>\n</table>\n'),
(87, 'Develop and roll out Fiestapoin program for Business', 35, '2.8.C', 0, '2015-01-01', '2016-01-01', '', '5.7.D', ''),
(88, 'Develop staff talent sourcing, placement and development to meet resource requirement in new branches', 72, '3.3.B', 0, '2014-07-14', '2015-07-14', '', '6.3.B', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">-Scale up recruitment capacity of micro staffs especially MKS and support staffs<br />\n			-Scale up training capacity of micro staffs in the region</td>\n		</tr>\n	</tbody>\n</table>\n'),
(89, 'Implement channel backbone and access layer  using API method', 22, '5.1.A', 0, '2014-01-01', '2015-12-31', '', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:34px; width:652px">Select channel backbone database software to create a common channel backbone&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(90, 'Remodeling branch Staffing requirement to address leadership talent gap in network expansion', 72, '3.3.C', 0, '2014-07-14', '2015-04-14', '', '6.2.A,6.5.B', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:69px; width:652px">-Remodel current branch resourcing requirement and policy to allow MMM to lead micro lean branch (including alternative of Teller coordinator to accompany MMM)<br />\n			-Set new model as the new policy of new staffing model for Lean branch&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(91, 'Develop Integrated Bank Statements', 89, '4.3.B', 0, '2017-07-01', '2018-12-31', '5.9.D', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:386pt">\n			<ul>\n				<li>Collaborate with IT to define expected format and content of integrated bank statements</li>\n				<li>Integrated bank statements should incorporate both business and non-business accounts</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(92, 'Implement API layer', 22, '5.1.B', 0, '2014-01-01', '2015-12-31', '', '5.1.A', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Implement API framework to expose APIs for core banking services</td>\n		</tr>\n	</tbody>\n</table>\n'),
(93, 'Implement Bank-wide CRM System and Develop Technology to Identify Potential Product for Each Customer', 58, '4.4.A', 0, '2019-12-01', '2020-12-31', '', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:89.25pt; width:386pt">\n			<ul>\n				<li>Collaborate with IT to improve data management system and create a single (360 degree) view of customer</li>\n				<li>Agree on CRM features required and timelines for roll-out</li>\n				<li>Collaborate with IT to develop capability to identify potential products Wealth clients are likely to value (i.e. &ldquo;next best product&rdquo;)</li>\n				<li>Develop interim solutions to perform a similar function, i.e. a system based on (a) RM knowledge and (b) client demography</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(94, 'Rewrite Inquiry and Service mobile app using API method (launch Mobile banking for business owners)', 22, '5.1.C', 0, '2014-01-01', '2015-12-31', '', '5.1.A', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Rewrite app for Inquiry and simple services using APIs</td>\n		</tr>\n	</tbody>\n</table>\n'),
(95, 'Enhance channel backbone', 22, '5.1.D', 0, '2016-01-01', '2017-07-01', '', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Perform enhancements such as Electronic Bill Presentment, Risk Based Authentication, Channel Analytics, Fraud Detection Management, etc.</td>\n		</tr>\n	</tbody>\n</table>\n'),
(96, 'Establish new sourcing initiatives for MMM', 72, '3.3.D', 0, '2014-09-15', '2015-03-13', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:68px; width:652px">-Determine and agree on&nbsp; the new potential source of MMM (i.e. from P3K, local fresh grad, CSO etc.)<br />\n			-Establish M3 Leadership Boot Camp &amp; Assessment to allow P3K to becomes M3 without going through the traditional and more academic SDP PPMM<br />\n			-Establish ODP regional to acquire local talent for local placement</td>\n		</tr>\n	</tbody>\n</table>\n'),
(97, 'Write Wealth advisory mobile app using API method', 22, '5.1.E', 0, '2016-01-01', '2016-06-30', '5.1.C', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Create a mobile app to allow access to latest research and product specialists</td>\n		</tr>\n	</tbody>\n</table>\n'),
(98, 'Decentralize elements of HO decision making and develop Micro HC competence in MBDCs', 72, '3.3.E', 0, '2014-07-14', '2014-10-17', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:489pt">-Regionalization of branch development, recruitment, staff training and operational support to MBDCs which currently conducted centrally by Micro HQ or Regional office (Kanwil)<br />\n			-Additional headcount will be needed in MBDCs as the number of supported staffs and networks grow</td>\n		</tr>\n	</tbody>\n</table>\n'),
(99, 'Create MKS mobile app using API method', 22, '5.1.F', 0, '2016-07-01', '2016-12-31', '5.1.c', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:20.25pt; width:489pt">Allow the micro team capability to carry out sales and collections at the same time</td>\n		</tr>\n	</tbody>\n</table>\n'),
(100, 'Develop a New Private Banking Brand ', 62, '4.5.A', 0, '2014-06-01', '2014-09-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:41.25pt; width:386pt">\n			<ul>\n				<li>Create new Private banking brand with the help of brand consultant</li>\n				<li>Work with brand consultant to develop and establish clear Private banking brand positioning and messaging</li>\n				<li>Align brand positioning, messaging and expressions with bank-wide brand refresh (i.e. Gen-Y, SME, sector re-branding)</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(101, 'Realign operational process post lean branch embedded to Mandiri distribution organization', 72, '3.3.F', 0, '2015-03-14', '2015-12-14', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51px; width:652px">-Assessment of current process on Market selection, front office operation, hard cash management, IT systems, and operation quality control<br />\n			-Identify and implement improvements&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(102, 'Rewrite Payments mobile app using API method', 22, '5.1.G', 0, '2017-01-01', '2017-06-30', '5.1.C', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:20.25pt; width:489pt">Create a mobile app that allows users to maintain recurring payments and make international payments</td>\n		</tr>\n	</tbody>\n</table>\n'),
(103, 'Develop the prototype of “Lean branch” and required sales / servicing capabilities, pilot & roll out', 74, '3.4.A', 0, '2014-07-14', '2015-07-14', '', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:114.75pt; width:489pt">-Determine products and services to be sold and referred in Lean Branch (i.e. what non-micro product to be offered through referral, savings product and basic services to be offered)<br />\n			-Define lean branch staffing model<br />\n			-System, product and marketing collateral development of selected products<br />\n			&#39;-Pilot &ldquo;Lean branch&rdquo; in different geographies and different segments<br />\n			-Pilot in full lean branch staffed branch and in existing micro branch staffing<br />\n			&#39;-Up-skill existing CS product knowledge and sales confidence<br />\n			-Determine the existing lean branches that are prioritized for additional staffing<br />\n			-Staged fulfillment of staffing required</td>\n		</tr>\n	</tbody>\n</table>\n'),
(104, 'Launch Marketing Campaign for New Private Banking Branding', 62, '4.5.B', 0, '2014-09-01', '2015-03-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:386pt">\n			<ul>\n				<li>Develop integrated marketing communication program to deliver Private banking value proposition and brand messaging</li>\n				<li>Execute implementation planning on marketing campaign</li>\n				<li>Determine marketing collateral / media placement including ATL &amp; BTL</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(105, 'Create CASA mobile app using API method', 22, '5.1.H', 0, '2017-07-01', '2017-12-31', '5.1.C', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Create an app that allows existing to apply for and create new deposits and CASA products</td>\n		</tr>\n	</tbody>\n</table>\n'),
(106, 'Create LOS mobile app using API method', 22, '5.1.I', 0, '2018-01-01', '2018-06-30', '5.1.C', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Create an App using APIs that allows users to apply for loans using mobiles</td>\n		</tr>\n	</tbody>\n</table>\n'),
(107, 'Rewrite Current internet apps using API method', 22, '5.1.J', 0, '2016-01-01', '2016-04-01', '5.1.C', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Rewrite Current internet apps for inquiry and simple services and domestic payments using APIs</td>\n		</tr>\n	</tbody>\n</table>\n'),
(108, 'Develop Distinctive e-Channel Features and Branch Channel ‘Look and Feel’', 62, '4.5.C', 0, '2014-07-01', '2015-04-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:386pt">\n			<p>Collaborate with EBG and Distribution Network to implement brand expressions across customer touch-points, i.e. e-channels, physical network, PBO/RM client treatment</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(109, 'Rewrite All Payments applications using API method', 22, '5.1.K', 0, '2017-07-01', '2017-10-31', '5.1.G', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Create functionality that allows users to maintain and operate ad-hoc payments, recurring payments through the internet using reusable APIs</td>\n		</tr>\n	</tbody>\n</table>\n'),
(110, 'Create CASA internet app using API method', 22, '5.1.L', 0, '2018-01-01', '2018-04-01', '5.1.H', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Create an app that allows existing to apply for and create new deposits and CASA products</td>\n		</tr>\n	</tbody>\n</table>\n'),
(111, 'Create LOS internet app using API method', 22, '5.1.M', 0, '2018-07-01', '2018-10-31', '5.1.I', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:17px; width:652px">Create functionality using APIs that allows users to apply for loans on the internet&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(112, 'Align performance management structure to optimize lean branch', 74, '3.4.B', 0, NULL, NULL, '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:489pt">-Significantly shifting micro CS service oriented KPI into a more sales oriented Sales generalist KPI<br />\n			-Develop Activity and sales monitoring system for new type CS<br />\n			-Align KPI of other staffs in micro distribution for Savings and cross sell of non-micro products</td>\n		</tr>\n	</tbody>\n</table>\n'),
(113, 'Rewrite Current branch apps using API method', 22, '5.1.N', 0, '2016-04-01', '2016-07-30', '5.1.J', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Rewrite Current branch apps for inquiry and simple services and domestic payments using APIs</td>\n		</tr>\n	</tbody>\n</table>\n'),
(114, 'Rewrite Payments branch app using API method', 22, '5.1.0', 0, '2017-11-01', '2018-02-01', '5.1.K', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Create functionality that allows users to maintain and operate ad-hoc payments, recurring payments through the ibranch terminals using reusable APIs</td>\n		</tr>\n	</tbody>\n</table>\n'),
(115, 'Pilot multiple Rural partnership model across multiple partners', 75, '3.5.A', 0, '2014-07-14', '2015-07-14', '', '6.2.A,6.5.B', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:489pt">Pilot four partnership models for savings and loan referrals with a variety of potential partners</td>\n		</tr>\n	</tbody>\n</table>\n'),
(116, 'Rewrite CASA branch app using API method', 22, '5.1.P', 0, '2018-04-01', '2018-07-30', '5.1.L', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Create an app that allows existing to apply for and create new deposits and CASA products using branch terminals</td>\n		</tr>\n	</tbody>\n</table>\n'),
(117, 'Pilot next phase of agent based banking anchored around “Lean branches”', 75, '3.5.B', 0, '2014-07-14', '2015-07-14', '', '6.2.A,6.5.B', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">-Test effectiveness of agents recruitment and on-boarding training<br />\n			-Test attractiveness of incentive scheme for agents<br />\n			-Test the level of support needed from Lean branch to maintain agents<br />\n			-Test fraud prevention and corrective mechanism</td>\n		</tr>\n	</tbody>\n</table>\n'),
(118, 'Create LOS branch app using API Method', 22, '5.1.Q', 0, '2018-11-01', '2019-02-01', '5.1.M', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Create functionality using APIs that allows users to apply for loans in branch terminals</td>\n		</tr>\n	</tbody>\n</table>\n'),
(119, 'Rewrite teller service apps using APIs', 22, '5.1.R', 0, '2019-02-01', '2019-08-30', '5.1.C', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Rewrite teller functionality using APIs</td>\n		</tr>\n	</tbody>\n</table>\n'),
(120, 'Quick and dirty portal integration', 22, '5.1.S', 0, '2015-06-01', '2015-10-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Create an access layer that maps all users entitlements to portals and presents only one portal when user logs in</td>\n		</tr>\n	</tbody>\n</table>\n'),
(121, 'Identify successful pilots and fast track to roll out solutions', 75, '3.5.C', 0, '2015-07-15', '2015-10-15', '', '6.2.A,6.3.B,6.5.B', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51px; width:652px">-Assess the most effective partnership / agent-based model<br />\n			-Develop pipeline of potential partners based on model<br />\n			-Roll out agent recruitments&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(122, 'Integrate Internet portal', 22, '5.1.T', 0, '2019-01-01', '2019-06-30', '5.1.J,5.1.K,5.1.L,5.1.M', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Create a more modern Internet Portal using HTML5 and Rich Internet Apps</td>\n		</tr>\n	</tbody>\n</table>\n'),
(123, 'Develop selected Rural markets via cluster based network expansion approach', 75, '3.5.D', 0, '2014-07-14', '2015-07-14', '', '6.2.A,6.5.B', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">-Develop policy of selecting new branches through cluster approach<br />\n			-Roll out clusterized branch development around &ldquo;core&rdquo; branch</td>\n		</tr>\n	</tbody>\n</table>\n'),
(124, 'Establish Pricing Strategy and Formalize Pricing Policies', 90, '4.6.A', 0, '2014-07-01', '2015-04-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:58.5pt; width:386pt">\n			<ul>\n				<li>Design pricing strategy framework based on priority / private banking status and relationship value (i.e. revenue generated per customer, product holding and length of relationship)</li>\n				<li>Define pricing policies specifying pricing guidelines and RM discretion</li>\n				<li>Develop internal communication plan to discuss pricing changes and role of RM in determining and communicating price</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(125, 'Integrate current branch app', 22, '5.1.U', 0, '2019-09-01', '2020-03-30', '5.1.N,5.1.O,5.1.P,5.1.Q,5.1.R', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Combine all branch apps in a single app portal to be accessed from branch terminals</td>\n		</tr>\n	</tbody>\n</table>\n'),
(126, 'Develop logical data model', 24, '5.2.A', 0, '2015-01-01', '2015-07-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Design comprehensive set of data to be captured including both customer and transaction data and how data should be integrated over banks full architecture</td>\n		</tr>\n	</tbody>\n</table>\n'),
(127, '3-in-1 Digital application for MKS', 76, '3.6.A', 0, NULL, NULL, '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">Define business requirement, develop, test and roll out MKS mobile app that include<br />\n			-Sales and pipeline tracking application<br />\n			-Loan status update and tracker<br />\n			-Collection tracker and scheduling application</td>\n		</tr>\n	</tbody>\n</table>\n'),
(128, 'Review and Upgrade Pricing Tool', 90, '4.6.B', 0, '2014-10-01', '2015-10-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:127.5pt; width:386pt">\n			<ul>\n				<li>Define business requirements for pricing tool</li>\n				<li>Describe necessary features of pricing tool post gap assessment</li>\n				<li>Determine investment/resources to make necessary changes</li>\n				<li>Develop trial product and pilot with selected PBOs/RMs &ndash; gather feedback and refine</li>\n				<li>Develop training, onboard PBOs/RMs, provide ongoing support</li>\n				<li>Develop tools to further empower PBOs and RMs&rsquo; interactions with the customer</li>\n				<li>Collaborate with IT (or third-party) to develop productivity tool to enable RM to take notes regarding changes in client profile in real time</li>\n				<li>Benchmark regional and global peers / non-banks to identify most appropriate features and ways of usage</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(129, 'Implement changes to data fields in Cards (ICS)', 24, '5.2.B', 0, '2015-08-01', '2015-10-30', '5.2.A', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Update ICS with new data to be captured and ensure integration with bank wide data set</td>\n		</tr>\n	</tbody>\n</table>\n'),
(130, 'Establish integrated portfolio view', 76, '3.6.B', 0, '2014-08-01', '2014-10-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">Develop platform to enable integrated portfolio view that can be readily accessed, that include:<br />\n			-Network profiles (location, neighborhood, competition etc.)<br />\n			-Portfolio performance and quality<br />\n			-Tracking of historical ownership of accounts</td>\n		</tr>\n	</tbody>\n</table>\n'),
(131, 'Implement changes to data fields in CBS (EMAS)', 24, '5.2.C', 0, '2015-11-01', '2016-06-30', '5.2.B', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Update EMAS with new data to be captured and ensure integration with bank wide data set</td>\n		</tr>\n	</tbody>\n</table>\n'),
(132, '“Loan factory” based document verification process', 76, '3.6.C', 0, '2014-07-14', '2014-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">-Design part of verification requirement and process that can be centralized<br />\n			-Pilot centralized verification process and continually fine tuning the policy and process<br />\n			-Define geographies of Micro network that will be centralized (versus geographies that will stay decentralized)</td>\n		</tr>\n	</tbody>\n</table>\n'),
(133, 'Develop Gen-Y Brand', 67, '4.7.A', 0, '2014-07-14', '2014-10-14', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:386pt">\n			<ul>\n				<li>With the help of brand consultant, decide between among 4 brand options</li>\n				<li>Work with brand consultant to develop and establish clear Gen-Y brand positioning and messaging</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(134, 'Implement changes to data fields in Consumer Finance (JOINFIS)', 24, '5.2.D', 0, '2016-07-01', '2016-09-28', '5.2.C', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Update JOINFIS with new data to be captured and ensure integration with bank wide data set</td>\n		</tr>\n	</tbody>\n</table>\n'),
(135, 'Streamlining payroll offering', 76, '3.6.D', 0, '2014-07-14', '2014-10-14', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">-Improve policy for sourcing for companies that are eligible for payroll<br />\n			-Staged roll out of areas where KSM is centralised and decentralised</td>\n		</tr>\n	</tbody>\n</table>\n'),
(136, 'Implement changes to data fields in Trade (EXIMBILLS)', 24, '5.2.E', 0, '2016-10-01', '2017-07-31', '5.2.D', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Update EXIMBILLS with new data to be captured and ensure integration with bank wide data set</td>\n		</tr>\n		<tr>\n			<td style="height:12.75pt; width:489pt">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:12.75pt; width:489pt">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:12.75pt; width:489pt">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:12.75pt; width:489pt">&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(137, 'Design and develop product platform, product packages & bundled, pilot & roll out in stages', 19, '3.7.A', 0, '2014-07-14', '2015-10-17', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:76.5pt; width:489pt">-Design installment savings plan features, value proposition and mechanics of its linkage with micro loans<br />\n			-Enhance system to facilitates smooth and simple operations of product<br />\n			&#39;Establish a number of product packages for different customers in micro network using one product platform<br />\n			&#39;-Pilot implementation of the product platform<br />\n			-Train sales for product knowledge and change in mindset<br />\n			-Align performance management to favor sales and maintenance of installment savings plan</td>\n		</tr>\n	</tbody>\n</table>\n');
INSERT INTO `initiative` (`id`, `title`, `program_id`, `code`, `tier`, `start`, `end`, `kickoff`, `completion`, `description`) VALUES
(138, 'Implement changes to data fields in Treasury (OPICS)', 24, '5.2.F', 0, '2017-08-01', '2017-10-31', '5.2.E', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Update OPICS with new data to be captured and ensure integration with bank wide data set</td>\n		</tr>\n	</tbody>\n</table>\n'),
(139, 'Develop marketing and communication strategies around “product bundles”', 19, '3.7.B', 0, '2015-04-16', '2015-07-16', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">-Develop marketing and communication strategy<br />\n			-Establish simple and suitable sales tools for use in branch</td>\n		</tr>\n	</tbody>\n</table>\n'),
(140, 'Create new CIF file', 24, '5.2.G', 0, '2015-08-01', '2016-07-31', '', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Set-up master CIF file with global IDs for each and link to slave CIFs (CIFs within other product processors such as ICS)</td>\n		</tr>\n	</tbody>\n</table>\n'),
(141, 'Top 50 customer data cleanup', 24, '5.2.H', 0, '2016-08-01', '2017-07-31', '', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Clean up data from top 50 customers to match structure of new CIF file</td>\n		</tr>\n	</tbody>\n</table>\n'),
(142, 'Sector data cleanup', 24, '5.2.I', 0, '2017-08-01', '2018-05-01', '0', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Clean up data from top 50 customers to match structure of new CIF file</td>\n		</tr>\n		<tr>\n			<td style="height:12.75pt; width:489pt">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:12.75pt; width:489pt">&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(143, 'Create dynamic data layer', 24, '5.2.J', 0, '2016-03-01', '2016-08-31', '5.2.A', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:489pt">Customer-centric view of enterprise data model in OLTP-optimized fashion accessible at two speeds:<br />\n			- Real time for multi-channel<br />\n			- Nightly batched runs for product processing</td>\n		</tr>\n	</tbody>\n</table>\n'),
(144, 'Launch Marketing Campaign to Roll Out New Brand', 67, '4.7.B', 0, '2014-04-15', '2014-04-16', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:56.25pt; width:386pt">\n			<ul>\n				<li>Design brand expression across customer touch-points, i.e. branch and digital channel &lsquo;look-and-feel,&rsquo; customer service attire and code of conduct and product packaging designs</li>\n				<li>Develop integrated marketing communication program to deliver Gen-Y value proposition and brand messaging</li>\n				<li>Execute marketing campaign &amp; programs with strong coordination with Distribution &amp; EBG</li>\n				<li>Determine marketing collateral / media placement including ATL &amp; BTL</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(145, 'Finalize detailed organization structure', 55, '8.1.A', 0, '2014-08-01', '2014-12-01', '', '6.1', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:54.0pt; width:489pt">-Map all roles in HO organization, detailed branch organization, WS branch requirements<br />\n			-Decide the roles that are required to move, and detailed transition plan</td>\n		</tr>\n	</tbody>\n</table>\n'),
(146, 'Generate Further Segmentation within Gen-Y Market, Develop Products Accordingly and Run Pilot and Full Roll Out', 68, '4.8.A', 0, '2014-07-14', '2015-10-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:178.5pt; width:386pt">\n			<ul>\n				<li>Identify sub-segments within Gen-Y (e.g. young parents, university students) based on combination of demographics and common needs</li>\n				<li>Define financial and relevant non-financial needs of each sub-segment</li>\n				<li>Define needs-based value proposition for each sub-segment (with the help of primary research)</li>\n				<li>Design target products and bundles, working with relevant product teams</li>\n				<li>Identify opportunities for personalization across products, services and channels</li>\n				<li>Engage the help of a design team to develop personalization options, aligning with overall brand messaging</li>\n				<li>Design local area pilots to test value proposition with each sub-segment</li>\n				<li>Obtain final approval from Retail Risk &amp; MORG before mass roll-out</li>\n				<li>After period of testing, roll out product offers across segments</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(147, 'Pilot of select components', 55, '8.1.B', 0, '2016-05-01', '2016-08-01', '1.2.B,9.1.H', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:54.0pt; width:489pt">-Conduct piloting of three CSTs for two sectors &ndash; Health and Ports<br />\n			-Conduct piloting of new (joint distribution) branch model in three areas</td>\n		</tr>\n	</tbody>\n</table>\n'),
(148, 'Finalize RACI definition', 55, '8.1.C', 0, '2016-03-31', '2016-07-31', '6.1', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:54.0pt; width:489pt">-Set RACI guidelines based on top-level management structure<br />\n			-Cascade RACI across the organization, i.e., group vs department head vs. staff</td>\n		</tr>\n	</tbody>\n</table>\n'),
(149, 'Populate dynamic data layer for non-business structures (i.e., mass individuals, wealth)', 24, '5.2.K', 0, '2016-09-01', '2018-03-30', '5.2.J', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Ensure that all product processors are interfacing with dynamic data layer for non-business structures</td>\n		</tr>\n		<tr>\n			<td style="height:25.5pt; width:489pt">&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(150, 'Training', 55, '8.1.D', 0, '2016-12-31', '2017-04-30', '6.3', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:54.0pt; width:489pt">-Train staff on key changes related to senior moves, sector units, new roles and RACIs</td>\n		</tr>\n	</tbody>\n</table>\n'),
(151, 'Populate dynamic data layer for business structures (i.e., SME, Micro, Wholesale)', 24, '5.2.L', 0, '2018-04-01', '2019-05-31', '5.2.J', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Ensure that all product processors are interfacing with dynamic data layer for business structures</td>\n		</tr>\n	</tbody>\n</table>\n'),
(152, 'Update service agreements', 55, '8.1.E', 0, '2016-03-31', '2016-07-31', '6.1', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:54.0pt; width:489pt">-Identify SOPs required for updating and gaps<br />\n			-Update SOPs to align with new organization<br />\n			-To be done in cohesion with service excellence program</td>\n		</tr>\n	</tbody>\n</table>\n'),
(153, 'Create data warehouse cube (e.g., customers, products, transactions)', 24, '5.2.M', 0, '2016-10-01', '2017-09-28', '5.2.A', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Build structure of 3 dimensions data warehouse cubes (customer, products, transactions) and link to relevant data sources</td>\n		</tr>\n	</tbody>\n</table>\n'),
(154, 'Design operational data source, datamarts, ETL layer', 24, '5.2.N', 0, '2017-10-01', '2019-07-31', '5.2.A', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:489pt">- Create ETL layer and relevant datamarts so that data from cubes can be provisioned for analystics<br />\n			- Update staging area and optimize data refresh mechanism</td>\n		</tr>\n	</tbody>\n</table>\n'),
(155, 'Enhance service levels', 55, '8.1.F', 0, '2015-05-01', '2015-11-01', '8.1.E', '1.1.B', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:54.0pt; width:489pt">Conduct review to ensure all service channels are capable of offering enhanced service levels (based on B)<br />\n			Identify required channel capabilities upgrades and develop roll out plans, i.e., Corporate Service Window proposition</td>\n		</tr>\n	</tbody>\n</table>\n'),
(156, 'Implement cross-sell management', 24, '5.2.O', 0, '2017-08-01', '2019-07-31', '5.2.J', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Allows marketing and sales team to manage marketing campaigns (e.g., email ads) and evaluate effectiveness of those campaigns</td>\n		</tr>\n	</tbody>\n</table>\n'),
(157, 'Establish credit analytics team', 55, '8.1.G', 0, '2014-07-14', '2014-12-31', '', '6.1.A,6.3.A,6.5.A', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:72px; width:652px">Define the nature of the credit analyst function and placement within org -&nbsp; career development, roles and responsibilities, required skills, etc.<br />\n			Develop staffing / recruiting model working with the business and credit<br />\n			Develop &ldquo;migration&rdquo; strategy to move credit out of the coverage function to create new &ldquo;lending&rdquo; product team</td>\n		</tr>\n	</tbody>\n</table>\n'),
(158, 'Implement campaigns management', 24, '5.2.P', 0, '2018-08-01', '2019-05-31', '5.2.J', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:34px; width:652px">Allows customer service team (e.g. call center) to log, trace, escalate and post-mortem analyze customer complaints&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(159, 'Initiate Loan Take-over Strategy', 69, '4.9.A', 0, '2014-07-01', '2014-10-14', '', '5.2.Q', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:386pt">\n			<ul>\n				<li>Develop product and marketing plan, including product terms, pricing, customer criteria, target market, risk approval, marketing strategy, SLAs, SOPs, etc.</li>\n				<li>Kick-start lead generation efforts in three ways (a) through pre-approved offers to existing customers, (b) through mortgage offers, (c) marketing in affluent and business districts, etc</li>\n			</ul>\n\n			<p>&nbsp;</p>\n\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(160, 'Implement complaint management', 24, '5.2.Q', 0, '2019-08-01', '2020-06-30', '5.2.J', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Analyzes opportunities to upsell products to existing client and cross sell along &ldquo;value chain&rdquo;</td>\n		</tr>\n		<tr>\n			<td style="height:12.75pt; width:489pt">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:12.75pt; width:489pt">&nbsp;</td>\n		</tr>\n		<tr>\n			<td style="height:12.75pt; width:489pt">&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(161, 'Wholesale portfolio segmentation', 55, '8.1.H', 0, '2014-06-01', '2014-07-31', '', '6.1.A,6.3.A,6.5.A', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:54.0pt; width:489pt">TO BE UPDATED: Identify the different sector group models, i.e., group contains experts, coverage, products and assess<br />\n			Create Sector Group charter based on step 1 and design the organizational blue print (roles, skills, KPIs)<br />\n			Develop recruiting plans including internal strategies to drive staffing appointments (coordinate with M&amp;A strategy)<br />\n			Develop &ldquo;sector&rdquo; capabilities build strategy &ndash; pro-hire, internal appointment, advisory board, partnerships<br />\n			Operationalize sector team: appoint leader, institute sector CST, migrate priority clients (as relevant) (link to program 1)</td>\n		</tr>\n	</tbody>\n</table>\n'),
(162, 'Enhance information support', 55, '8.1.I', 0, '2014-04-01', '2015-12-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:72px; width:652px">Perform detailed review of existing market intelligence provided across the bank to identify areas to strengthen (Pull together existing sources and make more accessible)<br />\n			Determine delivery model, i.e., part of decision support, new market intelligence team (location in the org)&ndash; assess and selection model<br />\n			(for new roles or model) define roles and responsibilities, competencies, KPIs and develop staffing plans and execute<br />\n			Initiate pilot for 1-2 key sectors and review results (2-3 months); refine as necessary<br />\n			Develop annual survey to systematically capture and understand client satisfaction and needs&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(163, 'Build transaction model for volume  forecast', 27, '5.3.A', 0, '2015-01-01', '2015-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Build transaction volume model (e.g. correlation between TPS and number of customer accounts) to determine capacity required for core banking as well as other product processors</td>\n		</tr>\n	</tbody>\n</table>\n'),
(164, 'Improve network monitoring', 27, '5.3.B', 0, '2015-01-01', '2020-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:34px; width:652px">Add network monitoring tools to enable real-time monitoring of network congestion and quality (e.g., latency, bit error rate, MTBF/MTTR1)&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(165, 'Develop customer experience roadmaps across channels in line with segment customer value proposition', 60, '9.1.A', 0, '2015-07-01', '2015-09-30', '', '', ''),
(166, 'Fix ATM monitoring and troubleshooting process', 27, '5.3.C', 0, '2014-10-01', '2015-09-30', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51px; width:652px">- Establish&nbsp; ATM project task-force to anlayze current ATM transaction failure logs, classify and prioritize issues<br />\n			- Identify root causes, develop quick-fix / workaround solutions, and deploy</td>\n		</tr>\n	</tbody>\n</table>\n'),
(167, 'Develop Loan Refinancing Strategy', 69, '4.9.B', 0, '2014-07-01', '2014-10-12', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:386pt">\n			<ul>\n				<li>Develop product and marketing plan, including product terms, pricing, customer criteria, target market, risk approval, marketing strategy, SLAs, SOPs, etc.</li>\n				<li>Kick-start marketing outreach to existing customer base via interim targeting solution, for example, using customer knowledge of frontline staff</li>\n				<li>Utilize CRM to improve targeting after CRM has been implemented</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(168, 'Develop Pricing (and funding) Strategy for Auto Loans', 69, '4.9.C', 0, '2014-07-08', '2014-10-14', '4.9.B', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:34px; width:515px">\n			<p>Collaborate with Consumer Loan and Treasury Unit&nbsp; to develop competitive pricing to be offered to customers for auto loans</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(169, 'Detail distribution channel requirements to deliver on intended customer experience', 60, '9.1.B', 0, '2015-10-01', '2015-12-31', '', '', ''),
(170, 'Introduce next generation ATMs with  latest features', 27, '5.3.D', 0, '2018-01-01', '2019-12-31', '5.3.C', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">Add next generation ATMs with a a broad spectrum of functionality, for example:<br />\n			- Personalized customer interaction (e.g. automatic dispensing of predefined amount)<br />\n			- New non-banking services (e.g. ticket booking)<br />\n			- Video-conferencing capabilities</td>\n		</tr>\n	</tbody>\n</table>\n'),
(171, '"Fix top reliability issues - One time payments - Periodic payments - Regular SWIFT releases - Other infra-structure upgrades  (e.g., CIP machine)"', 29, '5.4.A', 0, '2014-09-01', '2015-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:489pt">- Form a task force<br />\n			- Make a list of all payments processes with problems after interviewing operations and branch personnel<br />\n			- Resolve the top 10 issues one-by-one</td>\n		</tr>\n		<tr>\n			<td style="height:63.75pt; width:489pt">&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(172, 'Develop detailed description of sales and servicing models by customer segments based on broad directions given as part of 2020 strategy recommendation', 60, '9.1.C', 0, '2015-10-01', '2015-12-31', '', '', ''),
(173, '', 29, '5.4.B', 0, '2016-01-01', '2017-12-31', '0', '0', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">- Form a task force<br />\n			- Make a list of all payments processes manual operations still involved<br />\n			- Resolve the top 5 issues one-by-one</td>\n		</tr>\n		<tr>\n			<td style="height:51.0pt; width:489pt">&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(174, 'Develop and implement (via pilots)  new branch formats (based on 2020 strategy guidelines) and network configuration (as in reporting relationship, resource sharing)', 60, '9.1.D', 0, '2015-07-01', '2015-12-31', '', '', ''),
(175, 'Review scope of branch based operations, identify and implement MO/BO consolidation of operational activities', 60, '9.1.E', 0, '2014-08-01', '2015-12-31', '', '', ''),
(176, 'Develop product neutral distribution staff performance management framework', 60, '9.1.F', 0, '2014-08-01', '2014-10-31', '', '', ''),
(177, 'Launch pilots, refine and roll out solution based on new framework', 60, '9.1.G', 0, '2014-01-11', '2015-12-31', '', '', ''),
(178, 'Implement new distribution organization – leadership changes (HO and Region), changes in reporting lines, responsibilities and authorities, potential regional distribution staff rationalization', 60, '9.1.H', 0, '2014-08-01', '2014-11-30', '', '', ''),
(179, 'Develop, pilot and roll out new network planning and expansion process', 60, '9.1.I', 0, '2015-09-01', '2015-12-31', '', '', ''),
(180, 'Issue Business Card', 73, '4.10.A', 0, '2014-07-01', '2016-07-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:386pt">\n			<ul>\n				<li>Develop product and marketing strategy, including terms, features, customer criteria, etc</li>\n				<li>Conduct research and focus group session for Business Card</li>\n				<li>Collaborate with CBB and Micro to develop &lsquo;go-to-market&rsquo; strategy</li>\n				<li>Refine, remove and add features from initial round of feedback</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(181, 'Replace payments processing  platform', 29, '5.4.C', 0, '2018-01-01', '2020-12-31', '5.4.B', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:34px; width:652px">Implement a highly parameterized payments processing platform with common services, parameter based product management&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(182, 'Issue Revolver Card', 73, '4.10.B', 0, '2014-07-01', '2016-04-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:68px; width:515px">\n			<ul>\n				<li>Develop product and marketing strategy, including terms, features, customer criteria, etc</li>\n				<li>Conduct research and focus group session for&nbsp; Revolver Card</li>\n				<li>Refine, remove and add features from initial round of feedback</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(183, 'Fix KPI Process', 0, '10.1.A', 0, '2014-08-01', '2014-10-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:89.25pt; width:489pt">-Provide a clear mapping of the current KPI setting and cascading process in detail<br />\n			-Conduct gap analysis of KPI setting process vs. key issues identified during the diagnostic<br />\n			-Revise KPI policy to ensure alignment to 2020 strategy and the KPI process documents to address key gaps identified<br />\n			-Create an inventory of suitable KPI metrics for each key component of the balanced score card, and create sample score cards for each role and a pre-population functionality within the KPI system<br />\n			-Update of support systems such as IT</td>\n		</tr>\n	</tbody>\n</table>\n'),
(184, 'Formalize and assign roles', 65, '11.1.A', 0, '2014-09-01', '2015-03-01', '6.1', '6.3.C,8.1.A,10.1.A,6.5', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:102.0pt; width:489pt">-Finalize marketing organization (including new and existing functions)<br />\n			-Finalize detailed roles and responsibilities; and KPIs for marketing organization<br />\n			-Sign-off on marketing organization, roles and responsibilities; and KPIs<br />\n			-Map existing roles to new organization and develop transition plans<br />\n			-Discuss and refine transition plans with BU stakeholders<br />\n			-Establish recruitment / candidate screening guidelines for key external hires<br />\n			-Roll-out recruitment effort for key hires<br />\n			-On-board new hires into marketing organization</td>\n		</tr>\n	</tbody>\n</table>\n'),
(185, 'Finalize enhanced marketing processes', 65, '11.1.B', 0, '2014-10-01', '2015-01-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:489pt">-Develop detailed work-steps and the associated deliverables for the enhanced marketing process<br />\n			-Assign names to each of these work-steps and deliverables<br />\n			-Discuss and refine work-steps and requirements with designated individuals<br />\n			-Finalize and sign-off on enhanced end-to-end marketing process</td>\n		</tr>\n	</tbody>\n</table>\n'),
(186, '"Implement EDC solutions including - Improving EDC reliability - New EDC services - m-POS "', 29, '5.4.D', 0, '2018-01-01', '2018-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:489pt">May not be needed if Acquiring Aggregator is approved</td>\n		</tr>\n	</tbody>\n</table>\n'),
(187, 'Perform Cash management replatform', 29, '5.4.E', 0, '2014-01-01', '2017-03-30', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Implement a cash management platform as per the requirements laid out by business users in the cash management platform review</td>\n		</tr>\n	</tbody>\n</table>\n'),
(188, 'Migrate to acquiring aggregator', 29, '5.4.F', 0, '2015-01-01', '2016-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Carry out all migration activities from current platform to aggregator platform</td>\n		</tr>\n	</tbody>\n</table>\n'),
(189, 'Issue  Fleet Card', 73, '4.10.C', 0, '2014-07-01', '2016-01-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:85px; width:515px">\n			<ul>\n				<li>Develop product and marketing strategy, including terms, features, customer criteria, etc</li>\n				<li>Conduct research and focus group session for&nbsp; Fleet Card</li>\n				<li>Collaborate with Wholesale and RSS to develop &lsquo;go-to-market&rsquo; strategy</li>\n				<li>Refine, remove and add features from initial round of feedback&nbsp;</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(190, 'Create pricing engine', 32, '5.5.A', 0, '2016-01-01', '2016-10-31', '5.1.B', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:17px; width:652px">Create a rule-based pricing database that allows menu based pricing for all products and services&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(191, 'Broaden Distribution Reach through Strategic Partnerships', 73, '4.10.D', 0, '2014-07-01', '2015-10-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:38.25pt; width:386pt">\n			<ul>\n				<li>Explore alternative distribution channels, for example retailers and lifestyle partners</li>\n				<li>Follow four levers guidelines to ensure partnership success</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(192, 'Finalize RACI decision rights', 65, '11.1.C', 0, '2014-10-01', '2014-12-01', '', '10.1.A', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:76.5pt; width:489pt">-Finalize and sign-off RACI decision rights across marketing functions and processes, including cross-functional linkages<br />\n			-Identify and inform all BU stakeholders affected by finalized RACI<br />\n			-Socialize and educate RACI decision rights framework to identified BU stakeholders<br />\n			-Incorporate RACI with BU roles and responsibilities and KPIs<br />\n			-Update and detail reporting requirements (e.g. MIS)</td>\n		</tr>\n	</tbody>\n</table>\n'),
(193, 'Develop in-house appraisal team', 77, '4.11.A', 0, '2014-07-01', '2015-04-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:386pt">\n			<ul>\n				<li>Assess cost-benefit of developing an in-house appraisal team</li>\n				<li>Develop and execute plan to build in-house appraisal team</li>\n				<li>Detail talent acquisition plans, SOPs &amp; SLAs</li>\n				<li>Run &lsquo;test and learn&rsquo; simulations</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(194, 'Upgrade treasury system', 32, '5.5.B', 0, '2014-07-01', '2015-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Upgrade treasury system with additional functionality</td>\n		</tr>\n	</tbody>\n</table>\n'),
(195, 'Design primary & secondary mortgage program for priority banking customer', 36, '4.11.B', 0, '2015-02-01', '2015-10-08', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:386pt">\n			<p>Develop and launch marketing program to communicate new secondary market value proposition (i.e. pricing changes)</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(196, 'Replacement of trade system', 32, '5.5.C', 0, '2016-01-01', '2017-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Replacement of trade system adding additional functionality</td>\n		</tr>\n	</tbody>\n</table>\n'),
(197, 'Upgrade EMAS and DSP', 32, '5.5.d', 0, '2018-01-01', '2019-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Upgrade EMAS and DSP with additional functionality</td>\n		</tr>\n	</tbody>\n</table>\n'),
(198, '"Check capacity planning and upgrade for other product processors. Areas of focus include: - General Ledger (GL) - Integrated Card System (ICS) - DSP (Delivery Service Processor) - Core Payment System (CPS)"', 32, '5.5.E', 0, '2020-01-01', '2020-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:76.5pt; width:489pt">Carry out capacity planning for all core product processing systems including<br />\n			- Trade<br />\n			- Treasury<br />\n			- Complex Finance<br />\n			- Cards</td>\n		</tr>\n	</tbody>\n</table>\n'),
(199, 'Kick-start multiguna cross selling program', 36, '4.11.C', 0, '2015-01-01', '2015-08-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:386pt">\n			<ul>\n				<li>Create and launch marketing program to existing Mandiri customer base via direct marketing and in-branch methods</li>\n				<li>Run &lsquo;test and learn&rsquo; simulations to identify appropriate target customer group (with the highest propensity to take up HELOC)</li>\n			</ul>\n\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(200, 'Add AMLS', 34, '5.6.A', 0, '2014-06-01', '2015-05-30', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Provide software with Anti-money laundering functionality (e.g., Currency Transaction Reporting, Customer identification mgt, Transaction monitoring, Compliance)</td>\n		</tr>\n	</tbody>\n</table>\n'),
(201, 'Add Central liability system', 34, '5.6.B', 0, '2015-01-01', '2016-12-31', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">System combining all of a customer borrower&#39;s liabilities with the bank, including direct and indirect loans, letters of credit, guarantees, and other accommodation</td>\n		</tr>\n	</tbody>\n</table>\n'),
(202, 'Collaborate with wholesale on constructions sector solution', 78, '4.12.A', 0, '2014-07-01', '2015-04-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:63.75pt; width:386pt">\n			<ul>\n				<li>Initiate business plan to pursue construction sector solutions</li>\n				<li>Collaborate with Wholesale to design value proposition for developers, their suppliers and their customers</li>\n				<li>Pilot value proposition with anchor client(s) before rolling out sector solutions on a broader scale</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(203, 'Automate risk reporting', 34, '5.6.C', 0, '2016-01-01', '2017-09-30', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Automate current risk reports using scripts/tools</td>\n		</tr>\n	</tbody>\n</table>\n'),
(204, 'Adopt new pricing strategy', 78, '4.12.B', 0, '2014-08-15', '2015-04-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:386pt">Collaborate with Treasury Unit to design a longer term, fixed rate pricing to offer mortgage customers</td>\n		</tr>\n	</tbody>\n</table>\n'),
(205, 'Enhance collection system', 34, '5.6.D', 0, '2017-10-01', '2018-10-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:12.75pt; width:489pt">Provide a more customer-centric collection activities capturing customer value and risk profiles</td>\n		</tr>\n	</tbody>\n</table>\n'),
(206, 'Add Early Warning System', 34, '5.6.E', 0, '2019-01-01', '2020-02-28', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Notify the appropriate party that customer is likely to default so proactive measures may be taken</td>\n		</tr>\n	</tbody>\n</table>\n'),
(207, 'Develop Pension Loan', 79, '', 0, '2014-08-01', '2015-05-01', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:514px">\n	<tbody>\n		<tr>\n			<td style="height:51.0pt; width:386pt">\n			<ul>\n				<li>Design pension loan product (differentiated pricing for Mandiri pension account holders and outside), SOPs and SLAs</li>\n				<li>Seek risk approval from Retail Risk</li>\n				<li>Develop marketing plan to roll out product to Mandiri pension account holders</li>\n			</ul>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(208, 'Create Integrated 360 Risk View of Customer', 34, '5.6.F', 0, '2019-01-01', '2020-12-31', '5.6.B', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:25.5pt; width:489pt">Provide a comprehensive risk view of customers, including credit information, asset data, utility payments, credit capacity scores, demographics)</td>\n		</tr>\n	</tbody>\n</table>\n'),
(209, 'Perform Manual Data Exercise for Cross-Selling of Cards to CASA Holders', 37, '5.7..A', 0, '2014-05-01', '2014-09-30', '', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:34px; width:652px">Carry out a manual exercise within 3 branches to cross sell cards to current customers based on their probability of buying&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n'),
(210, 'Perform manual data exercise for cross-selling of business savings accounts  to CASA holders', 37, '5.7.B', 0, '2014-10-27', '2015-06-30', '5.7.A', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:34px; width:652px">Carry out a manual exercise within 3 branches to cross sell CASA to current customers based on their probability of buyiNG.</td>\n		</tr>\n	</tbody>\n</table>\n'),
(211, 'Perform manual data exercise for cross-selling of bancassurance to CASA holders', 37, '5.7.C', 0, '2015-08-01', '2016-06-30', '5.7.B', '', '<table border="0" cellpadding="0" cellspacing="0" style="width:652px">\n	<tbody>\n		<tr>\n			<td style="height:34px; width:652px">Carry out a manual exercise within 3 branches to cross sell Bancassurance to current customers based on their probability of buying&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n');

-- --------------------------------------------------------

--
-- Table structure for table `milestone`
--

CREATE TABLE IF NOT EXISTS `milestone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date NOT NULL,
  `status` varchar(600) NOT NULL,
  `workblock_id` int(11) NOT NULL,
  `revised` date DEFAULT NULL,
  `reason` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `milestone`
--

INSERT INTO `milestone` (`id`, `title`, `start`, `end`, `status`, `workblock_id`, `revised`, `reason`) VALUES
(25, 'Define the nature of the credit analyst function', NULL, '2014-07-03', 'Completed', 17, NULL, '0'),
(26, 'Develop operating procedure related to credit analyst function', NULL, '2014-07-03', 'Completed', 17, NULL, '0'),
(27, 'Pilot Project CA Function Implementation', NULL, '2015-01-14', 'In Progress', 17, NULL, '0'),
(28, 'Interim evaluation', NULL, '2014-10-15', 'In Progress', 17, NULL, ''),
(29, 'Mapping headcount CA within all organization', NULL, '2014-12-31', 'In Progress', 18, NULL, ''),
(30, 'Define source of manning fulfillment', NULL, '2014-12-31', 'In Progress', 18, NULL, ''),
(31, 'Manning fulfillment CA', NULL, '2015-10-15', 'Delay', 18, NULL, '0'),
(32, 'Detailing lending product team organization', NULL, '2015-03-31', 'Delay', 19, NULL, '0'),
(33, 'Inventarisir CA dan RM berikut debitur yang dikelola', NULL, '2015-03-31', 'Delay', 19, NULL, '0'),
(34, ' Block move CA to lending product team', NULL, '2015-10-15', 'Delay', 19, NULL, '0'),
(35, 'RFP & PMP	', NULL, '2015-01-09', 'Not Started Yet', 37, NULL, ''),
(36, 'FSD	', NULL, '2015-01-16', 'Not Started Yet', 37, NULL, ''),
(37, 'System development	', NULL, '2015-03-31', 'Not Started Yet', 37, NULL, ''),
(38, 'SIT	', NULL, '2015-04-30', 'Not Started Yet', 37, NULL, ''),
(39, 'UAT	', NULL, '2015-06-17', 'Not Started Yet', 37, NULL, ''),
(40, 'Migration	', NULL, '2015-06-19', 'Not Started Yet', 37, NULL, ''),
(41, 'Full Live Implementation	', NULL, '2015-06-30', 'Not Started Yet', 37, NULL, ''),
(42, 'System development	', NULL, '2014-07-25', 'Completed', 38, NULL, '0'),
(43, 'SIT	', NULL, '2014-08-31', 'Completed', 38, NULL, '0'),
(44, 'UAT	', NULL, '2014-09-30', 'Delay', 38, NULL, ''),
(45, 'Migration	', NULL, '2014-11-30', 'In Progress', 38, NULL, ''),
(46, 'Implementations Collection and Liquidity Solutions for BPJS Kesehatan	', NULL, '2014-09-29', 'Completed', 39, NULL, '0'),
(47, 'Implementations  Payment solutions for BPJS Kes/Collection for Hospitals', NULL, '2015-02-28', 'In Progress', 39, NULL, ''),
(48, 'Implementations  Collection solutions for In Health', NULL, '2014-12-31', 'In Progress', 39, NULL, ''),
(49, 'Implementations PaymentSolutions for Hospitals 	', NULL, '2015-02-28', 'In Progress', 39, NULL, ''),
(50, 'Explore Business Models and Needs', NULL, '2015-06-30', 'In Progress', 40, NULL, ''),
(51, 'Implement SCM in Pharmaceuticals Distribution Chain', NULL, '2015-09-30', 'In Progress', 40, NULL, ''),
(52, 'Explore Needs and Solutions for Healthcare Entities 	', NULL, '2014-10-31', 'In Progress', 41, NULL, ''),
(53, 'Distribute hospitals list and solutions  to relevant Business Unit', NULL, '2014-03-31', 'Completed', 42, NULL, ''),
(54, 'Roll Out Plans', NULL, '2014-12-31', 'In Progress', 42, NULL, '0'),
(55, 'Develop tracking and monitoring tools', NULL, '2014-03-30', 'Completed', 43, NULL, ''),
(56, 'Final evaluation	', NULL, '2014-12-31', 'In Progress', 17, NULL, ''),
(57, 'Develop job descprtion & required skill related to credit analyst function', NULL, '3014-12-31', 'In Progress', 17, NULL, ''),
(58, 'Develop credit analyst career path	', NULL, '2015-03-31', 'In Progress', 17, NULL, ''),
(59, 'Completed RFP	', NULL, '2014-03-28', 'Completed', 27, NULL, ''),
(60, 'RFP sent to vendors	', NULL, '2014-03-28', 'Completed', 27, NULL, ''),
(61, 'RFP response 	', NULL, '2014-09-29', 'Completed', 28, NULL, '0'),
(62, 'Proof of Concept 	', NULL, '2014-09-29', 'Completed', 28, NULL, ''),
(63, 'Assessment result	', NULL, '2014-09-29', 'Completed', 28, NULL, ''),
(64, 'Vendor selected/contract sign off	', NULL, '2014-10-24', 'In Progress', 28, NULL, ''),
(65, 'Functional Specification Document', NULL, '2014-12-05', 'In Progress', 29, NULL, ''),
(66, 'Technical Specification Document	', NULL, '2014-12-05', 'In Progress', 29, NULL, ''),
(67, 'Supporting documents	', NULL, '2015-07-31', 'In Progress', 30, NULL, ''),
(68, 'Fully-running system	', NULL, '2015-07-31', 'In Progress', 30, NULL, ''),
(69, 'Migration documentation	', NULL, '2015-08-31', 'In Progress', 31, NULL, ''),
(70, 'Full clients migration (Phase I)	', NULL, '2015-08-31', 'In Progress', 31, NULL, ''),
(71, 'Pembuatan feasibilty Study peningkatan ijin usaha cabang Mansek di Singapore	', NULL, '2014-09-30', 'Delay', 26, NULL, ''),
(72, 'Pengajuan ijin ke CnIC	', NULL, '2014-12-31', 'Not Started Yet', 26, NULL, ''),
(73, 'Pengajuan ijin usaha ke MAS (Monetary Authority of Singapore)	', NULL, '2015-12-31', 'Not Started Yet', 26, NULL, ''),
(74, 'SWOT Analysis 	', NULL, '2015-01-31', 'In Progress', 32, NULL, ''),
(75, 'Consumers Insight analysis	', NULL, '2015-01-31', 'In Progress', 33, NULL, ''),
(76, 'Bundling Build Branding strategy 	', NULL, '2015-05-01', 'In Progress', 34, NULL, ''),
(77, 'Post Survey Branding Analysis and Review	', NULL, '2015-05-31', 'In Progress', 35, NULL, ''),
(78, 'Socialization New Branding 	', NULL, '2015-07-15', 'In Progress', 36, NULL, ''),
(79, 'Detailed study of client needs on specific products', NULL, '2014-12-31', 'Not Started Yet', 20, NULL, ''),
(80, 'Study of competitor offerings', NULL, '2014-12-31', 'Not Started Yet', 20, NULL, ''),
(81, 'Detailed product proposition including pricing, currency pairs etc.', NULL, '2014-12-31', 'Not Started Yet', 20, NULL, ''),
(82, 'Gap analysis based on current and target state product proposition', NULL, '2014-12-31', 'Not Started Yet', 20, NULL, ''),
(83, 'Cost & coverage evaluation, system capacity, agreement preparation, legal review', NULL, '2014-09-30', 'Delay', 47, NULL, ''),
(84, 'Developing front end trade system for correspondent banks', NULL, '2015-03-30', 'Not Started Yet', 46, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `code` varchar(600) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `segment` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `title`, `code`, `start_date`, `end_date`, `segment`) VALUES
(1, 'Enhance Service Excellence', '1.1', NULL, NULL, 'Wholesale'),
(2, 'Develop Sector Solutions', '1.2', NULL, NULL, 'Wholesale'),
(3, 'Build Out Sector Expertise', '1.3', NULL, NULL, 'Wholesale'),
(4, 'Enhance Product Suite', '1.4', NULL, NULL, 'Wholesale'),
(5, 'Upgrade CRM and MIS Tools', '1.5', NULL, NULL, 'Wholesale'),
(7, 'Develop Relationship Pricing', '1.6', NULL, NULL, 'Wholesale'),
(19, 'Developing Next Generation Installment Savings Plan Proposition', '3.7', NULL, NULL, 'Mikro'),
(21, 'Reconfigure SME segment boundary and remap SME clients', '2.1', NULL, NULL, 'SME'),
(22, 'Channel And Process Modernization', '5.1', NULL, NULL, 'IT'),
(23, 'Develop and drive MSME sector based strategies', '2.2', NULL, NULL, 'SME'),
(24, 'Customer Data Architecture', '5.2', NULL, NULL, 'IT'),
(25, 'Plan and roll out “SME Ready” Branches', '2.3', NULL, NULL, 'SME'),
(26, 'Launch value added services / products and market leading SME digital platform', '2.4', NULL, NULL, 'SME'),
(27, 'Infrastructure Scale Up', '5.3', NULL, NULL, 'IT'),
(28, 'Become Indonesia’s No. 1 Merchant Solutions Bank', '2.5', NULL, NULL, 'SME'),
(29, 'Payments and Cash Management', '5.4', NULL, NULL, 'IT'),
(31, 'Target Micro transitioners and “high growth” startups', '2.6', NULL, NULL, 'SME'),
(32, 'Core Banking Tuning', '5.5', NULL, NULL, 'IT'),
(33, 'Develop market leading consumer finance and wealth proposition for SMEs', '2.7', NULL, NULL, 'SME'),
(34, 'Risk Management Buildl-Out', '5.6', NULL, NULL, 'IT'),
(35, 'Develop SME brand and launch loyalty-led marketing campaign', '2.8', NULL, NULL, 'SME'),
(36, 'Wealth – Align Service Model and Product Suite to Client Segments', '4.1', NULL, NULL, 'Individuals'),
(37, 'CRM Quick Wins', '5.7', NULL, NULL, 'IT'),
(38, 'Competency Frameworks', '6.1', NULL, NULL, 'HC'),
(39, 'End User Experience', '5.8', NULL, NULL, 'IT'),
(41, 'Strategic Workforce Planning', '6.2', NULL, NULL, 'HC'),
(42, 'Targeted Projects', '5.9', NULL, NULL, 'IT'),
(43, 'Recruiting', '6.3', NULL, NULL, 'HC'),
(44, 'Standards', '5.10', NULL, NULL, 'IT'),
(47, 'Pilot project to leverage Mandiri University to build workforce capability for 1 subsidiary – with rollout to others gradually', '6.4', NULL, NULL, 'HC'),
(48, 'Rewards & Performance Management', '6.5', NULL, NULL, 'HC'),
(49, 'Resources and Capacities Building for Credit Risk Analytics and Industry Expertise', '7.1', NULL, NULL, 'Risk'),
(50, 'HC Service Delivery', '6.6', NULL, NULL, 'HC'),
(51, 'Rating Models and Basel II Ris Parameters Development', '7.2', NULL, NULL, 'Risk'),
(52, 'EVP and Change Management', '6.7', NULL, NULL, 'HC'),
(53, 'Wealth – Strengthen Collaboration Across Bank-wide BUs to Enhance Product Suite and Client Processing', '4.2', NULL, NULL, 'Individuals'),
(54, 'Risk Process, Measures and Limits for Wholesale Programs', '7.3', NULL, NULL, 'Risk'),
(55, 'Organisation implementation', '8.1', NULL, NULL, 'Organization'),
(57, 'Risk Process, Measures and Limits for Retail Programs', '7.4', NULL, NULL, 'Risk'),
(58, 'Wealth – Improve Operating Platform ', '4.4', NULL, NULL, 'Individuals'),
(59, 'Risk Management Consolidation', '7.5', NULL, NULL, 'Risk'),
(60, 'Distribution and customer experience transformation', '9.1', NULL, NULL, 'Distribution'),
(61, 'Credit Risk MIS and Analytics Tools', '7.6', NULL, NULL, 'Risk'),
(62, 'Wealth – Collaborate with Third Party to Design Branding for Private Banking', '4.5', NULL, NULL, 'Individuals'),
(63, 'KPI', '10.1', NULL, NULL, 'Performance Management'),
(65, 'Organisation Implementation', '11.1', NULL, NULL, 'Marketing'),
(66, 'ROMI', '11.2', NULL, NULL, 'Marketing'),
(67, 'Gen-Y – Design Young, Dynamic Brand Targeting Gen-Y', '4.7', NULL, NULL, 'Individuals'),
(68, 'Gen-Y – Develop and Roll-out Personalized and Needs-based Products Targeting Gen-Y', '4.8', NULL, NULL, 'Individuals'),
(69, 'Auto Loans – Drive Loan Takeovers & Loan Refinancing and Implement New Pricing Strategy', '4.9', NULL, NULL, 'Individuals'),
(70, 'Develop Leading Micro Credit Risk Management System and Culture', '3.1', NULL, NULL, 'Mikro'),
(71, 'Making Mandiri A Highly Reputed Micro Bank', '3.2', NULL, NULL, 'Mikro'),
(72, 'Fast Track Branch Led Expansion in Semi Urban Locations', '3.3', NULL, NULL, 'Mikro'),
(73, 'Credit Cards – Design and Roll Out Suite of New Products Targeting Mass Affluent and Business Owners', '4.10', NULL, NULL, 'Individuals'),
(74, 'Development And Roll Out of “Lean Branch” Format', '3.4', NULL, NULL, 'Mikro'),
(75, 'Development of Scalable Rural Micro Franchise Expansion Model', '3.5', NULL, NULL, 'Mikro'),
(76, 'Enhancing Operational Excellence in Micro Business', '3.6', NULL, NULL, 'Mikro'),
(77, 'Mortgage (A) – Build Secondary Market Proposition via Specialist Team and Solicit “Loans Against Property” to Existing Customers ', '4.11', NULL, NULL, 'Individuals'),
(78, 'Mortgage (B) – Drive WS Sector Alliance with Leading Developers and Implement New Pricing Strategy', '4.12', NULL, NULL, 'Individuals'),
(79, 'Personal Loans – Launch Pension and Healthcare Products, and Drive Market Expansion', '4.13', NULL, NULL, 'Individuals'),
(80, 'CF Pre-approvals – Launch Pre-approval Offers in Credit Cards and Personal Loans', '4.14', NULL, NULL, 'Individuals'),
(81, 'CF Efficiency – Introduce CC marketing engine and improve U/W Process to Support Differentiation Across Products', '4.15', NULL, NULL, 'Individuals'),
(82, 'Payments: E/M-Commerce – Develop Strategic Partnerships with E/M-Commerce Players and Launch mPOS Solution', '4.16', NULL, NULL, 'Individuals'),
(83, 'Payments: P2P and Digital Banking – Establish Integrated Digital Community and Market Leading Digital Banking Offer', '4.17', NULL, NULL, 'Individuals'),
(84, 'Payments (Ecosystem): Loyalty – Enhance Fiestapoin to Bank-wide Relationship Rewards', '4.18', NULL, NULL, 'Individuals'),
(85, 'Payments (Ecosystem): Merchant Acquiring – Launch Merchant Acquiring Platform Around a New Business Model', '4.19', NULL, NULL, 'Individuals'),
(86, 'Payments (Ecosystem): Mobile Wallet and P2P Transactions - Lead in Mobile Wallet Proposition and Establish Integrated Digital Community', '4.20', NULL, NULL, 'Individuals'),
(87, 'Bank at Work – Develop Retail Packaged Products Targeting Corporate Employees and Civil Servants', '4.21', NULL, NULL, 'Individuals'),
(88, 'Bank at Work – Develop ‘Bank at Work’ Benefits Platform with Third-party Partnerships and Fiesta Rewards ', '4.22', NULL, NULL, 'Individuals'),
(89, 'Wealth – Boost Client Experience through Digital Applications ', '4.3', NULL, NULL, 'Individuals'),
(90, 'Wealth – Enhance pricing model to incorporate greater lever of bespoke pricing ', '4.6', NULL, NULL, 'Individuals');

-- --------------------------------------------------------

--
-- Table structure for table `revised`
--

CREATE TABLE IF NOT EXISTS `revised` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `milestone_id` int(11) NOT NULL,
  `revised_date` date NOT NULL,
  `reason` text NOT NULL,
  `action` text NOT NULL,
  `aprv_PMO` date DEFAULT NULL,
  `aprv_GH` date DEFAULT NULL,
  `PMO_id` varchar(600) NOT NULL,
  `GH_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `PMO_cmnt` text NOT NULL,
  `GH_cmnt` text NOT NULL,
  `date_update` datetime NOT NULL,
  `desc_GH` varchar(600) DEFAULT NULL,
  `desc_PMO` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `revised`
--

INSERT INTO `revised` (`id`, `milestone_id`, `revised_date`, `reason`, `action`, `aprv_PMO`, `aprv_GH`, `PMO_id`, `GH_id`, `user_id`, `PMO_cmnt`, `GH_cmnt`, `date_update`, `desc_GH`, `desc_PMO`) VALUES
(1, 31, '2015-10-30', 'Test', 'Test', NULL, NULL, 'Wholesale', 20, 21, '', '', '2014-09-30 05:18:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(600) NOT NULL,
  `password` varchar(600) NOT NULL,
  `name` varchar(600) NOT NULL,
  `role` varchar(600) NOT NULL,
  `segment` varchar(600) DEFAULT NULL,
  `jabatan` varchar(600) DEFAULT NULL,
  `initiative` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role`, `segment`, `jabatan`, `initiative`) VALUES
(4, 'tezzalr', 'a6313405d7d34459bca505ebc6cebd93', 'Tezza Lantika Riyanto', 'admin', '0', NULL, NULL),
(5, 'nixon', '93be821e64ce643fd708112c77531da8', 'Nixon', 'PIC', NULL, 'GH', '1.3.A'),
(6, 'marita', '4aed0aa3acc1d77dd569aac8029bb84b', 'Marita', 'PIC', NULL, 'DH', '1.3.A'),
(12, 'gaby', '5f4dcc3b5aa765d61d8327deb882cf99', 'Gaby Valeria', 'PIC,PMO', 'Wholesale', 'GH', '1.1.A;1.1.B;1.1.C;1.1.E;1.3.C;1.5.A;1.6.A;1.6.B;1.6.C'),
(13, 'putu', '5f4dcc3b5aa765d61d8327deb882cf99', 'Putu Anandika', 'PIC', NULL, 'DH', '1.1.A;1.1.B;1.1.C;1.1.E;1.3.C;1.5.A;1.6.A;1.6.B;1.6.C'),
(14, 'ferry', '5f4dcc3b5aa765d61d8327deb882cf99', 'Ferry M Robbani', 'PIC', NULL, 'GH', '1.4.F;1.4.G'),
(15, 'henni', '5f4dcc3b5aa765d61d8327deb882cf99', 'Henni', 'PIC', NULL, 'DH', '1.4.G'),
(16, 'erwanza', '5f4dcc3b5aa765d61d8327deb882cf99', 'Erwanza', 'PIC', NULL, 'DH', '1.4.F'),
(17, 'mahesh', '5f4dcc3b5aa765d61d8327deb882cf99', 'Mahesh', 'PIC', NULL, 'GH', '1.1.F;1.5.B;1.5.C'),
(18, 'anita', '5f4dcc3b5aa765d61d8327deb882cf99', 'Anita Widjaja', 'PIC', NULL, 'GH', '1.3.B'),
(19, 'tommy', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tommy', 'PIC', NULL, 'DH', '1.3.B'),
(20, 'setyowati', '5f4dcc3b5aa765d61d8327deb882cf99', 'Setyowati', 'PIC', NULL, 'GH', '1.1.D'),
(21, 'kepas', '5f4dcc3b5aa765d61d8327deb882cf99', 'Kepas', 'PIC', NULL, 'DH', '1.1.D'),
(22, 'andri', '5f4dcc3b5aa765d61d8327deb882cf99', 'Andri', 'PIC', NULL, 'GH', '1.2.B;1.4.A;1.4.B;1.4.C;1.4.H'),
(23, 'donny', '5f4dcc3b5aa765d61d8327deb882cf99', 'Donny Arsal', 'PIC', NULL, 'GH', '1.4.E'),
(24, 'andreas', '5f4dcc3b5aa765d61d8327deb882cf99', 'Andreas', 'PIC', NULL, 'DH', '1.4.E'),
(25, 'cera', '5f4dcc3b5aa765d61d8327deb882cf99', 'Cera', 'PIC', NULL, 'DH', '1.2.B;1.4.A'),
(26, 'prita', '5f4dcc3b5aa765d61d8327deb882cf99', 'Prita', 'PIC', NULL, 'DH', '1.4.B'),
(27, 'rustam', '5f4dcc3b5aa765d61d8327deb882cf99', 'Rustam', 'PIC', NULL, 'GH', '1.2.C'),
(28, 'tongki', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tongki Lentari', 'PIC', NULL, 'DH', '1.2.C'),
(29, 'didiek', '5f4dcc3b5aa765d61d8327deb882cf99', 'Didiek H', 'PIC', NULL, 'GH', '1.4.D'),
(30, 'oktav', '5f4dcc3b5aa765d61d8327deb882cf99', 'Oktav', 'PIC', NULL, 'DH', '1.4.D'),
(31, 'yoyok', '804da344974611d34d496565f15376f4', 'Hermawan Soebagio', 'admin', NULL, '', ''),
(32, '1084353929', 'cfdeb44dfa760c6dca6f3296867d1833', 'Andi Widyo Cahyono', 'PMO', 'Wholesale', 'GH', ''),
(33, 'cmt', '5f4dcc3b5aa765d61d8327deb882cf99', 'CMTers', 'admin', '', 'GH', '');

-- --------------------------------------------------------

--
-- Table structure for table `workblock`
--

CREATE TABLE IF NOT EXISTS `workblock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `objective` text,
  `initiative_id` int(11) NOT NULL,
  `pic` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `workblock`
--

INSERT INTO `workblock` (`id`, `title`, `start`, `end`, `objective`, `initiative_id`, `pic`) VALUES
(17, 'Define the nature of the credit analyst', NULL, NULL, '', 12, ''),
(18, 'Develop staffing / recruiting model', NULL, NULL, '', 12, ''),
(19, 'Develop “migration” strategy', NULL, NULL, '', 12, ''),
(20, 'Determine product proposition', NULL, NULL, '', 23, ''),
(21, 'Business requirements including licensing and platforms', NULL, NULL, '', 23, ''),
(23, 'Investment requirements', NULL, NULL, '', 23, ''),
(24, 'Strategic planning (build strategy)', NULL, NULL, '', 23, ''),
(25, 'Business build', NULL, NULL, '', 23, ''),
(26, 'Peningkatan ijin Usaha Mandiri Sekuritas Singapore', NULL, NULL, '', 5, ''),
(27, 'Develop RFP', NULL, NULL, '', 6, ''),
(28, 'Vendor Selection', NULL, NULL, '', 6, ''),
(29, 'Business Requirement Design', NULL, NULL, '', 6, ''),
(30, 'System Development', NULL, NULL, '', 6, ''),
(31, 'Platform Migration (Phase 1)', NULL, NULL, '', 6, ''),
(32, 'SWOT analysis', NULL, NULL, '', 4, ''),
(33, ' Consumers Insight analysis', NULL, NULL, '', 4, ''),
(34, 'Bundling Build Branding strategy', NULL, NULL, '', 4, ''),
(35, 'Post Survey Branding Analysis and Review', NULL, NULL, '', 4, ''),
(36, 'Socialization New Branding', NULL, NULL, '', 4, ''),
(37, 'Upgrade MCM', NULL, NULL, '', 20, ''),
(38, 'Quick Fix MCM', NULL, NULL, 'Improving the reliability & performance of MCM', 25, ''),
(39, 'Implementation of pilot program for BPJS Kesehatan, In Health & Providers -Hospitals', NULL, NULL, '', 16, ''),
(40, 'Opportunity Assessment  for COB Model, Accelerate Claims & Pharmaceuticals Chain', NULL, NULL, 'Provide healthcare solutions for claim collection, registration portal for COB Model, integrated services beetween providers & Pharmacy', 16, ''),
(41, 'Update Bank Mandiri Healthcare Sector Pitchbook	', NULL, NULL, 'Adjust our current Pitchbook for Healthcare Entities', 16, ''),
(42, 'Develop Client List and finalize roll out plans', NULL, NULL, 'Distribution of lists to the relevant Business Unit', 16, ''),
(43, 'Track and facilitate on going outreach process', NULL, NULL, 'Monitor solutions implementation	', 16, ''),
(44, 'Developing Custodian Supporting Application (CSA)', NULL, NULL, '', 24, ''),
(45, 'Enhancing Custody System', NULL, NULL, '', 24, ''),
(46, 'Packaging Bank Mandiri Trade Services System as other bank’s back office', NULL, NULL, '', 24, ''),
(47, 'Export Bill Collection Services', NULL, NULL, '', 24, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
