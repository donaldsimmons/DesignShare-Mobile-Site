<!-- Begins User_List_Page jQuery Mobile Page -->

<!-- Displays List of User-selected favorites (favs bookmarked and stored in database - originally from Dribbble API) -->

<div id="help_page" data-role="page">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">Help and Support</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="<?php echo base_url('index.php'); ?>">Profile</a></li>
                    <li><a href="<?php echo base_url('index.php/design_share/designs'); ?>" data-ajax="false">Designs</a></li>
                    <li><a href="<?php echo base_url('index.php/logout'); ?>">Log Out</a></li>
                </ul>
            </div> <!-- End NavBar Div -->
        </div> <!-- End Header Div -->
        <div data-role="content">
            <h3>Support</h3>
            <p>Having trouble using the site? Check out our FAQ section, or contact the DesignShare support team today!</p>
            
            <div data-role="collapsible-set" data-theme="e">
                <div data-role="collapsible" data-content-theme="a">
                    <h3>Support Contact Info</h3>
                    <p><span id="support_email">Support Email:</span> donaldsimmons@fullsail.edu</p>
                </div>
                <div data-role="collapsible" data-content-theme="a">
                    <h3>FAQ</h3>
                    <ul id="faq_content">
                        <li class="question">What is DesignShare?</li>
                            <li class="answer">
                                <p>DesignShare is a media-sharing site built to inpsire and drive creativity in its
                                members. Users are able to discover new and original art and are encouraged
                                to share their thoughts and opinions with the rest of the DesignShare community.
                                Share what it is that inspires you, and use DesignShare to gather inspiration before your
                                next project.</p>
                            </li>
                        <li class="question">Can I sumbit my designs to DesignShare?</li>
                            <li class="answer">
                                <p>Artwork on the DesignShare site is not generated or submitted by our
                                users. Instead, all designs are drawn from the &copy;Dribbble API, and you must
                                be a registered member of that site to submit work. DesignShare merely fosters the sharing
                                of ideas and inspiration, and there is no guarantee that any artwork submitted through the third-party
                                site will make it into the DesignShare application</p>
                            </li>    
                        <li class="question">Can I copy or use the artwork presented by DesignShare?</li>
                            <li class="answer">
                                <p>The artwork used by DesignShare is the property of the original artist.
                                Without direct permission from the artist, which is not available through DesignShare,
                                you cannot reproduce the images elsewhere, or share the artwork on other websites.</p>
                            </li>
                        <li class="question">How can I report misuse or copyright infringement?</li>
                            <li class="answer">
                                <p>If you suspect that users are submitting or displaying copyrighted material, or that the
                                material displayed on the DesignShare site violates copyright law, please use the 'Report Misuse' link
                                that is present on the details page for each design to report this misuse to the site administrators. Each case will be
                                investigated and dealt with by the administrators.</p>
                                <p>In addition, if users are posting or sharing inappropriate material in their comments, or aren't
                                behaving in ways that meet the requirements for user behavior (Terms and Conditions), please contact the administration
                                through the misuse link.</p>
                            </li>
                    </ul>
                </div>
                <div id="terms_and_conditions" data-role="collapsible" data-content-theme="a">
                    <h3>Terms and Conditions</h3>
                    <p>The following terms and conditions cover every use of the DesignShare web application, and
                    all of the content used in the application. This application is offered to you on the basis of your
                    acceptance and compliance, without modification of any terms, rules and policies, with the following guidelines. </p>
                    <p>Be sure to read this Agreement thoroughly before you use the website. In accessing and using any parts of the
                    site, you agree to, and are thereafter bound to, the terms and conditions contained in this Agreement. If you object to
                    any terms of service for this site, you may not access this website, or use any of its services.</p>
                    <p>Failure to abide by any and all terms set forth in this document will result in termination of services
                    for your account, and possible legal action, depending on the violation.</p>
                    <h4>Your Account</h4>
                    <p> If you create an account on the Website, you are responsible for maintaining the security of your account
                    and its content. You are fully responsible for all activities that occur under the account and any other actions
                    taken in connection with the Website. You cannot assign content to your account in a misleading or unlawful
                    manner, or in a manner that is intended to trade on another person's name or reputation. DesignShare may remove any unlawful
                    or misleading content at their discretion, as well as any content that will cause DesignShare liability. All breaches in security
                    must be immediately reported to the DesignShare administrators, including any unauthorized access of your account.
                    DesignShare will not be liable for any acts or omissions by You, the user, nor will DesignShare be liable
                    for any damages, of any kind, incurred as a result of such acts and omissions.</p>
                    <h4>Contributors' Responsibility</h4>
                    <p> If you operate a DesignShare account, comment on a design, or post material to the Website, post links on the Website, or otherwise make
                    (or allow any third party to make) material available by means of the Website (any such material, Content), You are entirely responsible
                    for the content of, and responsible for any harm resulting from, that Content. That is the case regardless of whether the Content in question constitutes
                    text or graphics. By making Content available, you represent and warrant that: </p>
                    <ul class="terms_list">
                        <li>the downloading, copying and use of the Content will not infringe the proprietary rights, including but not limited to the copyright, patent, trademark
                        or trade secret rights, of any third party;</li>
                        <li>if your employer has rights to intellectual property you create, you have either (i) received permission from your employer to post or make available the Content,
                        including but not limited to any software, or (ii) secured from your employer a waiver as to all rights in or to the Content;</li>
                        <li>you have fully complied with any third-party licenses relating to the Content, and have done all things necessary to successfully pass through to end users any
                        required terms;</li>
                        <li>the Content does not contain or install any viruses, worms, malware, Trojan horses or other harmful or destructive content;</li>
                        <li>the Content is not spam, is not machine- or randomly-generated, and does not contain unethical or unwanted commercial content designed to drive traffic to third
                        party sites or boost the search engine rankings of third party sites, or to further unlawful acts (such as phishing) or mislead recipients as to the source of
                        the material (such as spoofing);</li>
                        <li>the Content is not obscene, libelous or defamatory, hateful or racially or ethnically objectionable, and does not violate the privacy or publicity rights of any
                        third party;</li>
                        <li>your account is not getting advertised via unwanted electronic messages such as spam links on newsgroups, email lists, other blogs and web sites, and similar
                        unsolicited promotional methods;</li>
                        <li>your account is not named in a manner that misleads your readers into thinking that you are another person or company. For example, your account’s URL or name is
                        not the name of a person other than yourself or company other than your own; and</li>
                        <li>you have, in the case of Content that includes computer code, accurately categorized and/or described the type, nature, uses and effects of the materials, whether
                        requested to do so by DesignShare or otherwise.</li>
                    </ul>
                    <p>DesignShare reserves the right to remove any content, whether graphics, comments, or any other form of content at its discretion, for any reason whatsoever.</p>
                    <p>DesignShare reserves the right to ban any user or website from using the DesignShare service for at any time, for any reason</p>
                    <p>If you delete Content, DesignShare will use reasonable efforts to remove it from the Website, but you acknowledge that any caching or references to the Content may
                    not be made unavailable immediately.</p>
                    <p>Without limiting any of those representations or warranties, DesignShare has the right (though not the obligation) to, in DesignShare's sole discretion (i) refuse or remove
                    any content that, in DesignShare’s reasonable opinion, violates any DesignShare policy or is in any way harmful or objectionable, or (ii) terminate or deny access to and use
                    of the Website to any individual or entity for any reason, in DesignShare’s sole discretion. Dribbble will have no obligation to provide a refund of any amounts previously paid.</p>
                    <h4>Copyright Infringement</h4>
                    <p>DesignShare has adopted the following policy toward copyright infringement on the Service in accordance with the Digital Millennium Copyright Act (a copy of which is located at
                    http://www.loc.gov/copyright/legislation/dmca.pdf, the "DMCA").</p>
                    <p>The email address of DesignShare's Designated Agent for copyright takedown notices ("Designated Agent") is:</p>
                    <ul>
                        <li>Donald Simmons</li>
                        <li>Email: donaldsimmons@fullsail.edu</li>
                    </ul>
                    <p>If you believe that Content residing or accessible on or through the Service infringes a copyright, you may send a notice of copyright infringement containing the following
                    information to the Designated Agent at the address above:</p>
                    <ul class="terms_list">
                        <li>Identification of the material or work being infringed upon.</li>
                        <li>Identification of the material that is claimed to be infringing, including its location, with details sufficient enough so that DesignShare is capable of finding it and verifying
                        its existence.</li>
                        <li>Complete contact information for the notifying party (the "Notifying Party"), including name, address, telephone number and email address.</li>
                        <li>A statement that the Notifying Party has a good faith belief that the material is not authorized by the copyright owner, its agent or law.</li>
                        <li>A statement made under penalty of perjury that the information provided in the notice is accurate and that the Notifying Party is authorized to make the complaint on behalf of
                        the copyright owner.</li>
                        <li>A physical or electronic signature of a person authorized to act on behalf of the owner of the copyright that has been allegedly infringed.</li>
                    </ul>
                    <p>DesignShare will respond to any valid DMCA requests within 10 days. In all cases, if you do not hear a response from us within 10 days of submitting a complaint, please email us again at
                    <span id="copyright_email_address">donaldsimmons@fullsail.edu</span> to confirm that we received the original complaint. As you may know, spam blockers sometimes reject important emails from
                    unknown parties.</p>
                    <p>Please note that under applicable law any person who knowingly materially misrepresents that material or activity is infringing may be subject to liability for damages.</p>
                    <p>After removing access to the material pursuant to a valid DMCA notice, DesignShare will immediately notify the user responsible for the allegedly infringing material that it has removed
                    or disabled access to the material.</p>
                    <p>DesignShare reserves the right, in its sole discretion, to immediately terminate the account of any member who is the subject of repeated DMCA notifications.</p>
                    <h4>DCMA Counter-Notifications</h4>
                    <p>If you believe you are the wrongful subject of a DMCA notification, you may file a counter-notification with DesignShare by providing the following information to the Designated Agent
                    at the address above:</p>
                    <ul class="terms_list">
                        <li>The specific URLs of material that DesignShare has removed or to which access has been disabled.</li>
                        <li>Complete contact information, including your name, address, telephone number, and email address.</li>
                        <li>A statement that you consent to the jurisdiction of Federal District Court for the judicial district in which your address is located (or the federal district courts located in
                        Bay County, Florida if your address is outside of the United States), and that you will accept service of process from the person who provided the original DMCA notification or an agent of such person.</li>
                        <li>The following statement: "I swear, under penalty of perjury, that I have a good faith belief that the material was removed or disabled as a result of a mistake or misidentification of the material to be removed or disabled."</li>
                        <li>Your signature.</li>
                    </ul>
                    <p>Upon receipt of a valid counter-notification, DesignShare will forward it to the Notifying Party who submitted the original DMCA notification. The original Notifying Party (or the copyright holder he or she represents) will then have
                    ten (10) days to notify us that he or she has filed legal action relating to the allegedly infringing material. If DesignShare does not receive any such notification within ten (10) days, we may restore the material to the Services.</p>
                    <h4>Intellectual Property</h4>
                    <p>This Agreement does not transfer from DesignShare to you any DesignShare or third party intellectual property, and all right, title and interest in and to such property will remain (as between the parties) solely with DesignShare.
                    DesignShare, the DesignShare double-arrow logo, and all other trademarks, service marks, graphics and logos used in connection with DesignShare, or the Website are trademarks or registered trademarks of DesignShare or DesignShare's licensors.
                    Other trademarks, service marks, graphics and logos used in connection with the Website may be the trademarks of other third parties. Your use of the Website grants you no right or license to reproduce or otherwise use any Dribbble or third-party
                    trademarks.</p>
                    <h4>Changes</h4>
                    <p>DesignShare reserves the right, at its discretion, to replace, modify, or add to any part of this Agreement. It is your
                    responsibility as the user to check this Agreement periodically for any changes. Your continued use the Website, or access to
                    the Website, following the posting of any and all changes to this Agreement constitutes your acceptance of those changes. In
                    the future, DesignShare may also offer new services and/or features through the Website (including, the release of new tools
                    and resources). Such new features and/or services will also be subject to the terms and conditions included in this Agreement.</p>
                    <h4>Termination</h4>
                    <p>DesignShare may terminate your access to all or any part of the Website at any time, with or without cause and with or without
                    notice, effective immediately. If you wish to terminate this Agreement or you wish to terminate your DesignShare account, you may simply
                    discontinue using the Website. DesignShare can also terminate the Website immediately as part of a general shut down of our service. All
                    provisions of this Agreement which by their nature should survive termination shall survive termination, including, without limitation, ownership
                    provisions, warranty disclaimers, indemnity and limitations of liability.</p>
                    <h4>Warranties Disclaimer</h4>
                    <p>The DesignShare website is provided only "as is." DesignShare and its suppliers and/or licensors herby disclaim all warranties of any kind,
                    implied or express, including the warranties of merchantability, fitness for a certain purpose, and non-infringement, without limitations.
                    Please Note that neither DesignShare, nor its suppliers and licensors, makes any warranty that the Website will be error free or that access to the
                    Website will be continuous or uninterrupted. You unnderstand and accept that you download from, or otherwise obtain either services or content through,
                    the website at your own risk and at your own discretion.</p>
                    <h4>Limitation of Liability</h4>
                    <p>In no event will DesignShare, or its suppliers or licensors, be liable with respect to any subject matter of this agreement under any contract,
                    negligence, strict liability or other legal or equitable theory for: (i) any special, incidental or consequential damages; (ii) the cost of procurement
                    or substitute products or services; (iii) for interuption of use or loss or corruption of data; or (iv) for any amounts that exceed the fees paid by you
                    to DesignShare under this agreement during the twelve (12) month period prior to the cause of action. DesignShare shall have no liability for any failure
                    or delay due to matters beyond their reasonable control. The foregoing shall not apply to the extent prohibited by applicable law.</p>
                    <h4>Warranty and General Respresentation</h4>
                    <p>You warrant and represent that:</p>
                    <ul class="terms_list">
                        <li>(i) your use of the Website will be in strict accordance with the Dribbble Privacy Policy, with this Agreement and with all applicable laws and
                        regulations (including without limitation any local laws or regulations in your country, state, city, or other governmental area, regarding online
                        conduct and acceptable content, and including all applicable laws regarding the transmission of technical data exported from the United States or
                        the country in which you reside) and </li>
                        <li>(ii) your use of the Website will not infringe or misappropriate the intellectual property rights of any third party.</li>
                    </ul>
                    <h4>Indemnification</h4>
                    <p>You hereby agree to hold harmless and indemnify DesignShare, as well as any of its contractors, licensors, and their respective directors, officers,
                    employeess, and agents from against and from all claims and expenses, including attorneys fees, arising from your use of the Website, including but not
                    limited to out of your violation this Agreement.</p>
                </div>
            </div>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>&copy; 2013 DesignShare | All designs © their respective owners.</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End User_List_Page  Div -->